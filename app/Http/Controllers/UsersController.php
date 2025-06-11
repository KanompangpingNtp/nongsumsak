<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function UsersIndex()
    {
        return view('users.index');
    }
}
