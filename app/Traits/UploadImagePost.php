<?php

namespace App\Traits;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

trait UploadImagePost
{
    public function uploadImagePostEN(Request $request, $post): ?string {
        if ($file = $request->file('img')) {

            $name = Str::random(32) . '.' . $file->getClientOriginalExtension();

            Storage::disk('do')->putFileAs('images', $file, $name, 'public');
            $post->img = "images/$name";
            $post->save();

            return $post->img;
        }

        return null;
    }

    public function uploadImagePostRU(Request $request, $post): ?string {
        if ($file = $request->file('img_ru')) {

            $name = Str::random(32) . '.' . $file->getClientOriginalExtension();

            Storage::disk('do')->putFileAs('images', $file, $name, 'public');
            $post->img_ru = "images/$name";
            $post->save();

            return $post->img_ru;
        }

        return null;
    }
}
