<?php

namespace App\Http\Controllers\Admin\Post;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Post\StoreRequest;
use App\Models\Post;
use Illuminate\Support\Facades\Storage;

class StoreController extends Controller
{
    public function __invoke(StoreRequest $request)
    {
        $data = $request->validated();
        $data['preview_img'] = Storage::put('/images', $data['preview_img']);
        $data['main_img'] = Storage::put('/images', $data['main_img']);

        Post::firstOrCreate($data);

        return redirect(route('admin.post.index'));
    }
}
