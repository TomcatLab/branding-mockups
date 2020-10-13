<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cms;


class HomeController extends Controller
{
    //
    function index()
    {
        // $cms = new Cms;
        // $x = $cms->pages();
         
        // return response(json_encode($x), 200)
        //     ->header('Content-Type', 'application/json');

        // return "Under maintanance";
    }

    public function missingMethod($parameters = array())
    {
        return "loop page";
    }
}
