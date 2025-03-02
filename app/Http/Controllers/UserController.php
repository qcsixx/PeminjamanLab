<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function showPeminjam()
    {
        return view('user.dashboard-user');
    }
}
