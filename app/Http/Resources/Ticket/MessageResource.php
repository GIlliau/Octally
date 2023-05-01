<?php

namespace App\Http\Resources\Ticket;

use App\Http\Resources\User\UserShortResource;
use Illuminate\Http\Resources\Json\JsonResource;

class MessageResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'message' => $this->message,
            'files' => AttachmentResource::collection($this->attachments()->get()),
            'author' => UserShortResource::make($this->author),
            'created_at' => $this->created_at->format('d-m-Y H:i')
        ];
    }
}
