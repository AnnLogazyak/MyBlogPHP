<?php

namespace App\Http\Controllers\Admin\Post;

use App\Http\Controllers\Controller;
use App\Models\Post;

class UndoDeleteController extends BaseController
{
    public function __invoke()
    {
        // Находим последний удаленный пост
        $lastDeletedPost = Post::onlyTrashed()->latest('deleted_at')->first();

        if ($lastDeletedPost) {
            // Восстанавливаем пост
            $lastDeletedPost->restore();
            return redirect()->route('admin.post.index')->with('success', 'Удаленный пост восстановлена');
        }

        return redirect()->route('admin.post.index')->with('error', 'Нет удаленных постов');
    }
}
