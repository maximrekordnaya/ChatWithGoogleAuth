<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class OnlineUsersController extends Controller
{
    public function __invoke()
    {
        $users = User::whereNotNull('last_activity')
            ->orderBy('last_activity', 'desc')->get();
        $onlineUsers = [];
        foreach ($users as $user){
            $key = 'user-is-online-'.$user->id;
            if(Cache::has($key)){
                $onlineUsers[] = $user;
            }
        }
        return $onlineUsers;
    }
}
