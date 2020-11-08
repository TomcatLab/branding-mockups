<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LoginController extends Controller
{
    //
    public function index()
    {
        # code...
        return view('dashboard.pages.login', $this->data);
    }

    public function admin_login()
    {
        # code...
    }
}
