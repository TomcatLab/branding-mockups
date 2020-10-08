<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CmsController extends Controller
{
    public function index()
    {
        # code...
        return view('dashboard.pages.cms', $this->data);
    }
}
