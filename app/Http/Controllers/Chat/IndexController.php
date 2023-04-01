<?php

namespace App\Http\Controllers\Chat;

use App\Http\Controllers\Controller;
use App\Http\Controllers\OnlineUsersController;


class IndexController extends Controller
{
    public function __invoke()
    {
//        $users = OnlineUsersController::getUsersWithLogin();
        return view('index');
    }
}
