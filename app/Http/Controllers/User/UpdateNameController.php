<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\UpdateNameRequest;
use App\Models\User;
use Illuminate\Http\Request;

class UpdateNameController extends Controller
{
    public function __invoke(UpdateNameRequest $request, User $user)
    {
        $data = $request->validated();
        $user->update($data);

        return redirect()->route('user.show', compact('user'))->with('success', 'Имя успешно обновлено');
    }
}
