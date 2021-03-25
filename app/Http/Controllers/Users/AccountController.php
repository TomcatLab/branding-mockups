<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Pages;
use App\Models\Carts;
use App\Models\CartProducts;
use App\Models\Orders;
use App\Models\Packages;
use Auth;


class AccountController extends Controller
{
    //
    public $Request;
    public $Pages;
    public $Carts;
    public $Orders;
    public $CartProducts;
    public $Packages;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(
        Pages $Pages,
        Request $Request,
        Carts $Carts,
        Orders $Orders,
        CartProducts $CartProducts,
        Packages $Packages
    )
    {
        $this->Request = $Request;
        $this->Pages = $Pages;
        $this->Carts = $Carts;
        $this->Orders = $Orders;
        $this->CartProducts = $CartProducts;
        $this->Packages = $Packages;
        
        $this->middleware('auth');
        $this->Data["menus"] = $this->Pages->get_menus();
    }

    public function index($Page = "orders")
    {
        $User = Auth::user();
        $this->Data['Configs'] = [
            "blade" => "home.user.".$Page,
            "page" => $Page
        ];
        $this->Data['Resources'] = [
            "UserInfo" => [
                "name" => $User->name,
                "email" => $User->email
            ],
            "Orders" => $this->Orders->get_orders($User->id)
        ];
        return view('home.user.myaccount', $this->Data);
    }

    public function make_order()
    {
        $User = Auth::user();
        $Cart = $this->Request->session()->get('Cart', []);
        
        $CartProducts = $this->CartProducts->get_products($Cart['Id']);
        
        foreach ($CartProducts as $Product) {
            $Package = $this->Packages->where('mockup_id',$Product->product_id)->first();
            $this->Orders->package_id = $Package->mockup_id;
            $this->Orders->user_id = $User->id;
            $this->Orders->save();
        }
        $messages = [
            "success" => [
                "Successfully Updated"
            ]
        ];
        return redirect()->route('user.account','orders')->with($messages);
    }

    public function download($PackageId)
    {
        return Storage::download('packages/1614254250.zip');
    }

}
