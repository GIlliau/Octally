<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatePostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Interfaces\PostRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    private PostRepositoryInterface $postRepository;

    public function __construct(PostRepositoryInterface $postRepository)
    {

        $this->postRepository = $postRepository;
    }

    public function index(Request $request)
    {
        $this->resolvePagination($request);

        $posts = $this->postRepository->getPostsByUser(Auth::id(), $this->perPage);

        return view('posts.index');
    }

    public function create()
    {
        return view('posts.create');
    }

    public function store(CreatePostRequest $request)
    {
        $data = $request->validated();

        $data['user_id'] = Auth::id();

        $this->postRepository->createPost($data);

        return redirect('/post');
    }

    public function edit()
    {
        return view('posts.edit');
    }

    public function update(UpdatePostRequest $request, int $postId)
    {
        $data = $request->validated();

        $data['user_id'] = Auth::id();

        $this->postRepository->editPost($postId, Auth::id(), $data);

        return redirect('/post');
    }

    public function delete(int $postId)
    {
        $this->postRepository->deletePost($postId, Auth::id());

        return redirect('/post');
    }
}
