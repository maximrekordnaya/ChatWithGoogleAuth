<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\UpdateNameEmailRequest;
use App\Models\User;
use Illuminate\Http\Request;

class UpdateNameEmailController extends Controller
{
    public function __invoke(UpdateNameEmailRequest $request, User $user)
    {
        $data = $request->validated();
        $user->update($data);

        return redirect()->route('user.show', compact('user'))->with('success', 'User updated successfully');
    }
}
