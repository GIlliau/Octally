<?php

namespace App\Traits;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

trait UploadImage
{
    public function uploadImage(Request $request): ?string
    {
        if ($file = $request->file('image')) {

            $name = Str::random(32) . '.' . $file->getClientOriginalExtension();

            Storage::disk('public')->putFileAs('images', $file, $name, 'public');

            return "storage/images/$name";
        }

        return null;
    }
}
