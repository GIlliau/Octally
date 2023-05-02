<?php

namespace App\Http\Controllers;

use App\Http\Requests\LeftCommentRequest;
use App\Interfaces\CommentRepositoryInterface;
use App\Interfaces\PostRepositoryInterface;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BlogController extends Controller
{
    private PostRepositoryInterface $postRepository;
    private CommentRepositoryInterface $commentRepository;

    public function __construct(PostRepositoryInterface $postRepository, CommentRepositoryInterface $commentRepository)
    {

        $this->postRepository = $postRepository;
        $this->commentRepository = $commentRepository;
    }

    public function index(Request $request)
    {
        $request->validate([
            'search' => ['sometimes', 'string', 'max:100']
        ]);

        $this->resolvePagination($request);

        if (!is_null($request->search)) {
            $posts = $this->postRepository->search($request->search, $this->perPage);
        } else {
            $posts = $this->postRepository->getAllPosts($this->perPage);
        }

        $popularPosts = $this->postRepository->getPostsByPopularity($this->perPage);

        return view('index', ['posts' => $posts, 'popularPosts' => $popularPosts]);
    }

    public function post(int $postId)
    {
        $post = $this->postRepository->getPostPublicView($postId);
        $comments = $post->comment()->orderBy('id', 'desc')->get();

        return view('post', ['post' => $post, 'comments' => $comments, 'user' => Auth::user()]);
    }

    public function getPostByUser(Request $request, int $userId)
    {
        $this->resolvePagination($request);

        $posts = $this->postRepository->getPostsByUser($this->perPage, $userId);

        return view('index', ['posts' => $posts]);
    }

    public function leftComment(LeftCommentRequest $request)
    {
        $data = $request->validated();
        $data['user_id'] = Auth::id();

        $this->commentRepository->leftComment($data);

        return redirect()->back();
    }

    public function deleteComment($commentId)
    {
        $this->commentRepository->deleteComment($commentId, Auth::id());

        return redirect()->back();
    }
}
