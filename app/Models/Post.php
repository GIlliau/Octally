<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
        'user_id',
        'text',
        'title',
        'image',
    ];

    protected $appends = ['preview', 'largePreview', 'date'];

    public function comment()
    {
        return $this->hasMany(Comment::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function getPreviewAttribute()
    {
        return strip_tags(substr($this->text, 0, 50)) . '...';
    }

    public function getLargePreviewAttribute()
    {
        return strip_tags(substr($this->text, 0, 200)) . '...';
    }

    public function getDateAttribute()
    {
        return Carbon::parse($this->created_at)->format("M d, Y");
    }

    public function addView()
    {
        $this->seen++;
        $this->save();
    }
}
