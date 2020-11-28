<?php

namespace App\Http\Controllers;

use App\Models\Conversation;
use Illuminate\Http\Request;

class ConversationController extends Controller
{

    public function index()
    {
        $conversations = auth()->user()->conversations()->last();
        if($conversations) {
            $conversations = $conversations->get();
        } else {
            $conversations = [];
        }
        return view('conversations.index', ['conversations' => $conversations]);
    }

    public function show(Conversation $conversation)
    {
        return view('conversations.show', ['conversation' => $conversation]);
    }

}
