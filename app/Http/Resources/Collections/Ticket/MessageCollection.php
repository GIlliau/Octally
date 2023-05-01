<?php

namespace App\Http\Resources\Collections\Ticket;

use App\Http\Resources\Ticket\MessageResource;
use Illuminate\Http\Resources\Json\ResourceCollection;

class MessageCollection extends ResourceCollection
{
    public function toArray($request)
    {
        return [
            'data' => MessageResource::collection($this->collection->reverse())
        ];
    }

    public function withResponse($request, $response)
    {
        $jsonResponse = json_decode($response->getContent(), true);
        unset($jsonResponse['links'],$jsonResponse['meta']);
        $response->setContent(json_encode(array_merge($jsonResponse, ['meta' => [
            'total' => $this->total(),
            'count' => $this->count(),
            'current_page' => $this->currentPage(),
            'total_pages' => $this->lastPage()
        ]])));
    }
}
