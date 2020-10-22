<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cms;


class HomeController extends Controller
{

    public $Request;

    public function __construct(Request $request)
    {
        $this->Request = $request;
    }

    function index()
    {
        return view("home.pages.mockups");
        //return $this->Request->segment(1);
    }

    public function missingMethod($parameters = array())
    {
        return "loop page";
    }
}
