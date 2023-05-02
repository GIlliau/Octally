<?php

namespace App\Traits;

use App\Models\Admin;
use App\Models\Comment;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;

trait ProcessingPagination
{
    protected function resolvePagination(Request $request): void
    {
        $this->currentPage = (int)$request->input('page', 1);
        $this->perPage = (int)$request->input('per_page', 15);

        Paginator::currentPageResolver(function () {
            return $this->currentPage;
        });
    }
}
