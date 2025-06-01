<?php

namespace App\Http\Controllers\Admin\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\User\UpdateRequest;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UpdateController extends Controller
{
    public function __invoke(UpdateRequest $request, User $user)
    {
        $data = $request->validated();

        // Формируем массив данных для обновления
        $updateData = [
            'name' => $data['name'],
            'email' => $data['email'],
            'role_id' => (int) $data['role_id'],
        ];

        // Добавляем пароль только если он заполнен
        if ($request->filled('password')) {
            $updateData['password'] = Hash::make($data['password']);
        }

        $user->update($updateData);

        return view("admin.user.show", compact("user"));
    }
}
