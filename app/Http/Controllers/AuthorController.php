<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\Post;
use Inertia\Inertia;

class AuthorController extends Controller
{
    public function index()
    {

        return Inertia::render('Author', [
            'post' => Post::latest()->first(),
            'authors' => Inertia::defer(function () {
                sleep(3); // Simulate a 3-second delay
                return Author::latest()->get();
            }),
        ]);
    }




}
