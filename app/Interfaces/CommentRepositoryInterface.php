<?php

namespace App\Interfaces;

interface CommentRepositoryInterface
{
    public function leftComment(array $data);
    public function deleteComment(int $commentId, int $userId);
}
