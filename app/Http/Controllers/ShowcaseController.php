<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ShowcaseController extends Controller
{
    //
    public function index()
    {
        # code...
        return view('dashboard.pages.showcase', $this->data);
    }
}
