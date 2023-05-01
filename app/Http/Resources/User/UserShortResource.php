<?php

namespace App\Http\Resources\User;

use Illuminate\Http\Resources\Json\JsonResource;

class UserShortResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'account' => $this->account,
            'name' => $this->name,
            'avatar' => $this->avatar ? env('DO_SPACES_URL').'/'.$this->avatar : env('DO_SPACES_URL').'/'.'images/avatar.jpg'
        ];
    }
}
