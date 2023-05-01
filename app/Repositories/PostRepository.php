<?php

namespace App\Repositories;

use App\Interfaces\PostRepositoryInterface;
use App\Models\Comment;
use App\Models\Post;
use App\Traits\CheckAccess;

class PostRepository implements PostRepositoryInterface
{
    use CheckAccess;
    public function getPostById(int $id): object
    {
        return Post::with('comment')->where('id', $id)->first();
    }

    public function getPostsByUser(int $userId, ?int $perPage = null): object
    {
        return Post::where('user_id', $userId)->paginate($perPage);
    }

    public function getAllPosts(?int $perPage = null): object
    {
        return Post::orderBy('id', 'desc')->paginate($perPage);
    }

    public function getPostsByPopularity(?int $perPage = null): object
    {
        return Post::orderBy('seen', 'desc')->paginate($perPage);
    }

    public function createPost(array $data): object
    {
        return Post::create($data);
    }

    public function editPost(int $postId, int $userId, array $data): object
    {
        $post = Post::where('id', $postId)->first();

        $this->checkAccess($userId, $post);

        $post->update($data);

        return $post;
    }

    public function deletePost(int $postId, int $userId): void
    {
        $post = Post::where('id', $postId)->first();

        $this->checkAccess($userId, $post);

        $post->delete();
    }

    public function leftComment(array $data): object
    {
        return Comment::create($data);
    }

    public function deleteComment(int $commentId, int $userId)
    {
        $comment = Comment::where('id', $commentId)->first();

        $this->checkAccess($userId, $comment);

        $comment->delete();
    }
}
