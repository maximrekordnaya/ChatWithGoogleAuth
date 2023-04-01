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

        $user->update([
            'password' => Hash::make($data['password']),
        ]);
        return redirect()->route('user.show', compact('user'))->with('success', 'Password updated successfully');
    }
}
