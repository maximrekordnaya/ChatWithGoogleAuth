<?php

namespace App\Http\Controllers\Chat;

use App\Http\Controllers\Controller;
use App\Models\Message;
use Illuminate\Http\Request;

class MessagesController extends Controller
{
    public function __invoke()
    {
        return Message::query()
            ->with('user')
            ->get();
    }
}
