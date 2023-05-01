<?php

namespace App\Repositories;

use App\Interfaces\CommentRepositoryInterface;
use App\Models\Comment;
use App\Traits\CheckAccess;

class CommentRepository implements CommentRepositoryInterface
{
    use CheckAccess;

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
