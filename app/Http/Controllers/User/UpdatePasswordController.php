<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\UpdatePasswordRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UpdatePasswordController extends Controller
{
    public function __invoke(UpdatePasswordRequest $request, User $user)
    {
        $data = $request->validated();
        $password = $data['password_old'];
        $hashedPassword = $user->password;
        if(Hash::check($password, $hashedPassword)){
            $user->update([
                'password' => Hash::make($data['password']),

            ]);
            return redirect()->route('user.show', compact('user'))->with('successPass', 'Пароль обновлен');
        }
        return redirect()->route('user.show', compact('user'))->with('wrongPass', 'Заполните поля правильно');

    }
}
