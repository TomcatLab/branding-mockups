<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SettingsController extends Controller
{
    //
    public function index()
    {
        # code...
        return view('dashboard.pages.settings', $this->data);
    }
}
