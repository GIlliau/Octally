<?php

namespace App\Http\Resources\Ticket;

use Exception;
use Illuminate\Http\Resources\Json\JsonResource;

class AttachmentResource extends JsonResource
{
    public function toArray($request)
    {
        $path = '';
        try { $path = env('DO_SPACES_URL').'/'.$this->path; }
        catch(Exception $e){}

        return [
            'file' => $path
        ];
    }
}
