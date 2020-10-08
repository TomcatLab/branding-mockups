<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    //
    public function index()
    {
        # code...
        return view('dashboard.pages.login', $this->data);
    }
}
