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
    public function index($Slug = null,$Id = null)
    {
        $this->Data['PageConfig'] = [
            
        ];
        if(!empty($Slug)){
            return view('home.pages.'.$Slug, $this->Data);
        }else{
            return view('home.pages.mockups', $this->Data);
        }
        // }elseif(empty($PageSlug_2) && !empty($PageSlug_1)){
        //     return view('home.pages.'.$PageSlug_1, $this->Data);
        // }elseif(!empty($PageSlug_1) && empty($PageSlug_2)){
        //     return view('home.pages.mockup', $this->Data);
        // }
    }

    private function page_handler($Slug, $Id)
    {
        
    }
}
