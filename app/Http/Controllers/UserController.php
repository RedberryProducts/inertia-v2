<?php

namespace App\Http\Controllers;

use App\Models\User;
use Inertia\Inertia;

class UserController extends Controller
{
    public function index()
    {
        return Inertia::render('User', [
            'users' => User::limit(50)->get(),
            'top' => fn() => User::inRandomOrder()->take(10)->get()
        ]);
    }

}
