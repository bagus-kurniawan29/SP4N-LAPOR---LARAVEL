<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ChatController extends Controller
{
    public function sendMessage(Request $request, $id)
    {
        $request->validate([
            'message' => 'required'
        ]);

        Message::create([
            'laporan_id' => $id,
            'user_id' => Auth::id(),
            'message' => $request->message,
        ]);

        return back()->with('success', 'Pesan terkirim!');
    }
}