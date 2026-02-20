<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Broadcast;
use App\Events\MessageSent;

class ChatController extends Controller
{
public function sendMessage(Request $request, $id)
{
    $request->validate([
        'reply' => 'required',
    ]);

    $message = Message::create([
        'laporan_id' => $id,
        'user_id'    => auth()->id(),
        'message'    => $request->reply,
    ]);
    broadcast(new MessageSent($message->load('user')))->toOthers();

    return back();
}
}