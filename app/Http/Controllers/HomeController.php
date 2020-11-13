<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
        $this->Data["menu"] = [
            [
                "type" => "page",
                "label" => "Mockups",
                "link" => ""
            ],
            [
                "type" => "page",
                "label" => "Freebies",
                "link" => ""
            ],
            [
                "type" => "page",
                "label" => "Showcase",
                "link" => ""
            ],
        ];
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home.pages.mockups' , $this->Data);
    }
}
