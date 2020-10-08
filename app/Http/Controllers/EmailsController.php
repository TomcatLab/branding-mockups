<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EmailsController extends Controller
{
    //
    public function index()
    {
        # code...
        return view('dashboard.pages.cms', $this->data);
    }
}
