<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pages;
use App\Models\Configurations;
use App\Models\Mockups;
use App\Models\Showcases;
use App\Models\CartProducts;
use App\Models\Presentations;


class HomeController extends Controller
{
    public $Pages;
    public $Request;
    public $Configurations;
    public $MockupCategories;
    public $Showcases;
    public $CartProducts;
    public $Cart;
    public $Presentations;
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
        Showcases $Showcases,
        CartProducts $CartProducts,
        Presentations $Presentations
    )
    {
        $this->Pages = $Pages;
        $this->Request = $Request;
        $this->Configurations = $Configurations;
        $this->Mockups = $Mockups;
        $this->Showcases = $Showcases;
        $this->CartProducts = $CartProducts;
        $this->Presentations = $Presentations;

        //$this->middleware('auth');
        $this->Data["menus"] = $this->Pages->get_menus();
        //$this->Data["cart"]["count"] = $this->CartProducts->get_product_count();
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index($Slug = null,$Id = null, $Pagination = null)
    {

        $this->Data['PageConfig'] = [
            "home" => $this->Pages->get_home_page(),
            "config" => $this->Configurations->get_configurations(3),
        ];

        $this->Data['PageData'] = $this->page_data_handler($Slug, $Id, $Pagination);
        $this->Data['Cart'] = $this->cart_handler();

        //return $this->Data['PageData'];
        return view('home.pages.'.$this->Data['PageConfig']["self"]->slug, $this->Data);
    }

    private function page_data_handler($Slug, $Id, $Pagination)
    {
        $this->Data['PageConfig']["self"] = $this->Pages->by_slug($Slug ? $Slug : 'mockups');
        
        $Return = [];

        if($this->Data['PageConfig']["self"]->data){
            $Data = explode(",",$this->Data['PageConfig']["self"]->data);
            foreach ($Data as $key => $value) {
                switch ($value) {
                case "mockups":
                    $Return["mockups"] = $this->Mockups->by_groups();
                    break;
                case "freebies":
                    $Return["freebies"] = $this->Mockups->by_groups(2);
                    break;
                case "showcase":
                    $Return["showcase"] = $this->Showcases->all();
                    break;
                case "mockup":
                    $Return["mockup"] = $this->Mockups->where("id",$Id)->first();
                    break;
                case "presentation":
                    $Return["presentation"] = $this->Presentations->where("mockup_id",$Id)->first();
                    break;
                case "structure":
                    $Return["structure"] = $this->Presentations->structure();
                    break;
                default:
                    //
                }
            }
        }

        return $Return;
    }

    private function cart_handler()
    {
        $Cart = $this->Request->session()->get('Cart', []);

        $Return = [
            "count" => 0
        ];

        if(!empty($Cart)){
            $Return['count'] = $this->CartProducts->where('cart_id',$Cart['Id'])->where('deleted_at',null)->count();
        }

        return $Return;
    }
}
