<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use App\Models\Post;

class IndexController extends Controller
{
    public function __invoke()
    {
//        $posts = Post::all();
//        $randomPosts = Post::get()->random(4);
//        $likedPosts = Post::withCount('likedUsers')->orderBy('liked_users_count', 'DESC')->get()->take(4);
//        return view('main.index', compact('posts', 'randomPosts', 'likedPosts'));
        return redirect()->route('post.index');
    }
}
