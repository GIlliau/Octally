<?php

namespace App\Traits;

use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

trait UploadAvatar
{
    public function uploadAvatar(Request $request, $user): void {
        if ($file = $request->file('photo')) {
            Storage::disk('do')->delete("avatars_dashboard/$user->picture");
            $user->update(['avatar' => '']);
            $name = $user->id. $user->name . '.' . $file->getClientOriginalExtension();

            Storage::disk('do')->putFileAs('avatars_dashboard', $file, $name, 'public');
            $user->avatar = "avatars_dashboard/$name";
            $user->save(); 
        }
    }
}
