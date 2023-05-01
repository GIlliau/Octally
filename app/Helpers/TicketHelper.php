<?php

namespace App\Helpers;

use App\Models\Ticket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class TicketHelper
{
    public static function saveMessage(Request $request, Ticket $ticket) {

        $message = $ticket->messages()->create([
            'message' => $request->message,
            'user_id' => Auth::id()
        ]);

        if ($files = $request->files->get('files')) {
            foreach ($files as $file) {
                $hash = Str::random(32);

                Storage::disk('do')->putFileAs('ticket/'.$ticket->id, $file, $hash.'.'.$file->getClientOriginalExtension(), 'public');

                $message->attachments()->create([
                    'path' => 'ticket/'.$ticket->id.'/'.$hash.'.'.$file->getClientOriginalExtension()
                ]);
            }
        }

        return $message;
    }
}
