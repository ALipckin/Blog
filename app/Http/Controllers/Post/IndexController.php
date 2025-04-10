<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use App\Models\Post;

class IndexController extends Controller
{
    public function __invoke()
    {
        $posts = Post::paginate(9);
        $tempPosts = Post::get();
        $randomPosts = $tempPosts->count() > 0 ? $tempPosts->random(4) : null;
        $likedPosts = Post::withCount('likedUsers')->orderBy('liked_users_count', 'DESC')->get()->take(4);

        return view('post.index', compact('posts', 'randomPosts', 'likedPosts' ) );

    }
}
