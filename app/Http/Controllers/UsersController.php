<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UsersController extends Controller
{
    //
    public function index()
    {
        # code...
        return view('dashboard.pages.users', $this->data);
    }
}
