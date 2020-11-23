<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pages;
use App\Models\Configurations;
use App\Models\Mockups;
use App\Models\Showcases;



class HomeController extends Controller
{
    public $Pages;
    public $Request;
    public $Configurations;
    public $MockupCategories;
    public $Showcases;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(
        Pages $Pages,
        Request $Request,
        Mockups $Mockups,
        Configurations $Configurations,
        Showcases $Showcases
    )
    {
        $this->Pages = $Pages;
        $this->Request = $Request;
        $this->Configurations = $Configurations;
        $this->Mockups = $Mockups;
        $this->Showcases = $Showcases;

        //$this->middleware('auth');
        $this->Data["menus"] = $this->Pages->get_menus();
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index($Slug = null,$Id = null, $Pagination = null)
    {
        $this->page_handler($Slug, $Id, $Pagination);

        $this->Data['PageConfig'] = [
            "home" => $this->Pages->get_home_page(),
            "config" => $this->Configurations->get_configurations(3),
        ];
        $this->Data['PageData'] = [
            "mockups" => $this->Mockups->all(),
            "showcase" => $this->Showcases->all()
        ];

        if(!empty($Slug)){
            $this->Data['PageConfig']["self"] = $this->Pages->by_slug($Slug);

            return view('home.pages.'.$this->Data['PageConfig']["self"]->slug, $this->Data);
        }else{
            $this->Data['PageConfig']["self"] = $this->Pages->by_slug($this->Data['PageConfig']["home"]->slug);

            return view('home.pages.'.$this->Data['PageConfig']["home"]->slug, $this->Data);
        }
    }

    private function page_handler($Slug, $Id, $Pagination)
    {
        
    }
}
