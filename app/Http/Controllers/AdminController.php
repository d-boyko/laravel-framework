<?php

namespace App\Http\Controllers;

use App\Models\User;

class AdminController extends Controller
{
    public function listOfUsers()
    {
        $response = User::all();
        return view('user.index', compact('response'));
    }

    public function showUser($id)
    {
        $response = User::find($id);
        return view('user.show', compact('response'));
    }
}
