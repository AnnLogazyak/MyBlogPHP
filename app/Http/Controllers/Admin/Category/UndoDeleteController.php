<?php

namespace App\Http\Controllers\Admin\Category;

use App\Http\Controllers\Controller;
use App\Models\Category;

class UndoDeleteController extends Controller
{
    public function __invoke()
    {
        // Находим последнюю удалённую категорию
        $lastDeletedCategory = Category::onlyTrashed()->latest('deleted_at')->first();

        if ($lastDeletedCategory) {
            // Восстанавливаем категорию
            $lastDeletedCategory->restore();
            return redirect()->route('admin.category.index')->with('success', 'Удаленная категория успешно восстановлена');
        }

        return redirect()->route('admin.category.index')->with('error', 'Нет удаленных категорий');
    }
}
