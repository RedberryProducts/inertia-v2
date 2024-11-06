<?php

namespace App\Http\Controllers;

use App\Models\User;
use Inertia\Inertia;

class ListController extends Controller
{
    public function index()
    {
        $users = User::paginate(50);

        return Inertia::render('List', [
            'users' => Inertia::merge(function () use ($users) {
                sleep(2);
                return $users->items();
            }),
            'current' => $users->currentPage(),
            'last' => $users->lastPage(),
        ]);
    }

}
