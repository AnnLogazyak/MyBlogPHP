<?php

namespace App\Http\Controllers\Admin\User;

use App\Http\Controllers\Controller;
use App\Models\User;

class UndoDeleteController extends Controller
{
    public function __invoke()
    {
        // Находим последнего удаленного пользователя
        $lastDeletedUser = User::onlyTrashed()->latest('deleted_at')->first();

        if ($lastDeletedUser) {
            // Восстанавливаем пользователя
            $lastDeletedUser->restore();
            return redirect()->route('admin.user.index')->with('success', 'Пользователь успешно восстановлен');
        }

        return redirect()->route('admin.user.index')->with('error', 'Нет удаленных пользователей');
    }
}
