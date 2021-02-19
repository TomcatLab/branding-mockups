<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Carts;
use App\Models\CartProducts;
use App\Models\Pages;
use App\Models\Mockups;
use App\Models\Configurations;


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

    }

    public function cart()
    {
        $Cart = $this->Request->session()->get('Cart', []);
        
        if(!empty($Cart)){
            $this->Data["Produts"] = $this->CartProducts->where('cart_id',$Cart['Id'])->get();
        }else{
            $this->Data["Produts"]  = $this->CartProducts->where('cart_id',0)->get();
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
            $CartKey = md5(microtime().rand());
            $this->Carts->key = $CartKey;
            $this->Carts->checkout = 0;
            $this->Carts->save();
            $CartId = $this->Carts->id;
            $this->Request->session()->put("Cart",['Key'=> $CartKey, 'Id' => $CartId]);
        }else{
            $CartKey = $CartSession['Key'];
            $CartId = $CartSession['Id'];
        }

        $ProductId = $this->Request->input('ProductId');
        
        $CartProducts = $this->CartProducts->is_exist_in_cart($CartId, $ProductId);

        if(!$CartProducts) {
            $Mockups = $this->Mockups->where('id',$ProductId)->first();
            $this->CartProducts->cart_id = $CartId;
            $this->CartProducts->product_id = $ProductId;
            $this->CartProducts->name = $Mockups->name;
            $this->CartProducts->description = $Mockups->description;
            $this->CartProducts->price = $Mockups->price;
            $this->CartProducts->category_id = $Mockups->category_id;
            $this->CartProducts->slug = $Mockups->slug;
            $this->CartProducts->save();       
        }

        $Data = [
            "response" => "success",
            "key" => "",
            "data" => ""
        ];
        return response($Data, 200)->header('Content-Type', 'application/json');
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
        // $CartKey = $CartSession['Key'];
        // $CartId = $CartSession['Id'];

        // $this->CartProducts = CartProducts::where("cart_id",$CartId);
        // $this->CartProducts->delete();

        $messages = [
            "success" => [
                "Successfully Updated"
            ]
        ];    
        
        return redirect()->route('user.cart')->with($messages);
    }
}
