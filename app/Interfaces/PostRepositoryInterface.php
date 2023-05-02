<?php

namespace App\Interfaces;

interface PostRepositoryInterface
{
    public function getPostEditorView(int $userId, int $id);
    public function getPostPublicView(int $id);
    public function getPostsByUser(int $userId, ?int $perPage = null);
    public function getAllPosts(?int $perPage = null);
    public function search(string $text, ?int $perPage = null);
    public function getPostsByPopularity(?int $perPage = null);
    public function createPost(array $data);
    public function editPost(int $postId, int $userId, array $data);
    public function deletePost(int $postId, int $userId);
    public function leftComment(array $data);
    public function deleteComment(int $commentId, int $userId);
}
