<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Carts;
use App\Models\CartProducts;
use App\Models\Pages;
use App\Models\Mockups;
use App\Models\Configurations;
use Auth;


class CartsController extends Controller
{
    //
    public $Request;
    public $Carts;
    public $Pages;
    public $CartProducts;
    public $Mockups;
    public $Configurations;
    public $Configs = [];

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(
        Request $Request,
        Pages $Pages,
        Carts $Carts,
        CartProducts $CartProducts,
        Mockups $Mockups,
        Configurations $Configurations
    )
    {
        $this->Request = $Request;
        $this->Carts = $Carts;
        $this->Pages = $Pages;
        $this->CartProducts = $CartProducts;
        $this->Mockups = $Mockups;
        $this->Configurations = $Configurations;

        //$this->middleware('auth');
        $this->Data["menus"] = $this->Pages->get_menus();
        $Config = $this->Configurations->all();

        foreach ($Config as $key => $config) {
            $this->Configs[$config->key] = $config->value ? $config->value : $config->default;
        }
        $this->Data["Config"] = $this->Configs;
        $this->Data["Cart"] = $this->cart_handler();
    }

    public function cart()
    {
        $Cart = $this->Request->session()->get('Cart', []);
        $User = Auth::user();

        $this->Data['Resources'] = [
            "UserInfo" => [
                "name" => $User ? $User->name : '',
                "email" => $User ? $User->email : ''
            ]
        ];

        if(!empty($Cart)){
            $this->Data["Produts"] = $this->Carts->get_cart_products($Cart['Id']);
        }else{
            $this->Data["Produts"]  = $this->CartProducts->where('cart_id',0)->where('deleted_at',null)->get();
        }

        $this->Data["BillingInformaion"] = [
            "Price" => 0,
            "Quantity" => 0,
            "Tax" => $this->Configs['TAX'],
            "Discount" => $this->Configs['DISCOUNT'],
            "ExtraCharge" => $this->Configs['EXTRA_CHARGE'],
            "GrandTotal" => 0
        ];

        foreach ($this->Data["Produts"] as $Produts) {
            $this->Data["BillingInformaion"]["Price"] = 
                $this->Data["BillingInformaion"]["Price"] + $Produts->price;
            $this->Data["BillingInformaion"]["Quantity"] = $this->Data["BillingInformaion"]["Quantity"] + 1; 
        }

        $this->Data["BillingInformaion"]["Tax"] = $this->Data["BillingInformaion"]["Price"] * $this->Configs['TAX'] / 100;
        
        $this->Data["BillingInformaion"]["Discount"] = $this->Data["BillingInformaion"]["Price"] * $this->Configs['DISCOUNT'] / 100;

        $this->Data["BillingInformaion"]["GrandTotal"] = 
            $this->Data["BillingInformaion"]["Price"] + 
            $this->Data["BillingInformaion"]["Tax"] +
            $this->Data["BillingInformaion"]["ExtraCharge"] -
            $this->Data["BillingInformaion"]["Discount"];
        

        return view('home.user.cart', $this->Data);
    }

    //
    public function add_to_cart()
    {
        //$this->Request->session()->flush();

        $CartSession = $this->Request->session()->get('Cart', null);

        if(empty($CartSession)){
            $CartSession = $this->create_cart();
        }else{
            if(!($this->Carts->is_exist($CartSession['Id']))){
                $CartSession = $this->create_cart();
            }
        }

        $ProductId = $this->Request->input('ProductId');
        
        $CartProducts = $this->CartProducts->is_exist_in_cart($CartSession['Id'], $ProductId);

        if(!$CartProducts) {
            $Mockups = $this->Mockups->where('id',$ProductId)->first();
            $this->CartProducts->cart_id = $CartSession['Id'];
            $this->CartProducts->product_id = $ProductId;
            $this->CartProducts->save();
        }

        $Data = [
            "response" => "success",
            "key" => "",
            "data" => ""
        ];
        return response($CartSession, 200)->header('Content-Type', 'application/json');
    }

    private function create_cart()
    {
        $CartKey = md5(microtime().rand());

        $this->Carts->key = $CartKey;
        $this->Carts->checkout = 0;
        $this->Carts->save();

        $CartId = $this->Carts->id;
        $this->Request->session()->put("Cart",['Key'=> $CartKey, 'Id' => $CartId]);

        return ["Key" => $CartKey, "Id" => $CartId];
    }

    public function remove_from_cart()
    {
        $CartItemId = $this->Request->input('CartItemId');
        $this->CartProducts = CartProducts::find($CartItemId);
        $this->CartProducts->delete();
        
        $Data = [
            "status" => "success",
            "message" => "Successfully Removed.",
            "cartItemId" => $CartItemId
        ];
        return response($Data, 200)->header('Content-Type', 'application/json');
    }

    public function clear_cart()
    {
        $CartSession = $this->Request->session()->get('Cart', null);
        $CartKey = $CartSession['Key'];
        $CartId = $CartSession['Id'];

        $this->CartProducts = CartProducts::where("cart_id",$CartId);
        $this->CartProducts->delete();

        $messages = [
            "success" => [
                "Successfully Updated"
            ]
        ];    
        
        return redirect()->route('user.cart')->with($messages);
    }

    private function cart_handler()
    {
        //$Cart = $this->Request->session()->get('Cart', []);

        $Return = [
            "count" => 0
        ];

        if(!empty($Cart)){
            $Return['count'] = $this->CartProducts->where('cart_id',$Cart['Id'])->count();
        }

        return $Return;
    }
}
