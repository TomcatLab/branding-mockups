<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pages;

class HomeController extends Controller
{
    public $Pages;
    public $Request;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(
        Pages $Pages,
        Request $Request
    )
    {
        $this->Pages = $Pages;
        $this->Request = $Request;

        //$this->middleware('auth');
        $this->Data["menus"] = $this->Pages->get_menus();
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $PageSlug_1 = $this->Request->segment(2);
        $PageSlug_2 = $this->Request->segment(3);

        if(empty($PageSlug)){
            return view('home.pages.mockups' , $this->Data);
        }elseif( empty($PageSlug_2) && !empty($PageSlug_1)){
            return view('home.pages.'.$PageSlug , $this->Data);
        }
    }
}
