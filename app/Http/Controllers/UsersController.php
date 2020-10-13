<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UsersController extends Controller
{
    //
    public function index()
    {
        return view('dashboard.pages.users', $this->data);
    }
    public function trash()
    {
        return view('dashboard.pages.users', $this->data);
    }
}
