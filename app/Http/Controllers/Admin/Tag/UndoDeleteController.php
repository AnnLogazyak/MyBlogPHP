<?php

namespace App\Http\Controllers\Admin\Tag;

use App\Http\Controllers\Controller;
use App\Models\Tag;

class UndoDeleteController extends Controller
{
    public function __invoke()
    {
        // Находим последний удалённый тег
        $lastDeletedTag = Tag::onlyTrashed()->latest('deleted_at')->first();

        if ($lastDeletedTag) {
            // Восстанавливаем тег
            $lastDeletedTag->restore();
            return redirect()->route('admin.tag.index')->with('success', 'Удаленный тег успешно восстановлен');
        }

        return redirect()->route('admin.tag.index')->with('error', 'Нет удаленных тегов');
    }
}
