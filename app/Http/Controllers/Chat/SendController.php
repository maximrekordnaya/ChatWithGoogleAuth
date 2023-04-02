<?php

namespace App\Http\Controllers\Chat;

use App\Events\MessageSend;
use App\Http\Controllers\Controller;
use App\Http\Requests\MessageFormRequest;
use Illuminate\Http\Request;

class SendController extends Controller
{
    public function __invoke(MessageFormRequest $request)
    {
        $message = $request->user()
            ->messages()
            ->create($request->validated());
        broadcast(new MessageSend($request->user(), $message));
        return $message;
    }
}
