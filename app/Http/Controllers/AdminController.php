<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function AdminIndex()
    {
        return view('admin.index');
    }
}
