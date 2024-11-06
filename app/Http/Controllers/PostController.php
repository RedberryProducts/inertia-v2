<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Inertia\Inertia;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::latest()->get();
        $initialVisitors = rand(100, 500);

        return Inertia::render('Feed', [
            'posts' => $posts,
            'visitorCount' => $initialVisitors,
            'morePosts' => Post::inRandomOrder()->take(5)->get(),
        ]);
    }

}
