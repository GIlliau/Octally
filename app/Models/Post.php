<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
        'user_id',
        'text',
        'tittle'
    ];

    public function comment()
    {
        return $this->hasMany(Comment::class);
    }
}
