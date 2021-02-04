<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Carts;
use App\Models\CartProducts;
use App\Models\Pages;
use App\Models\Mockups;

class CartsController extends Controller
{
    //
    public $Request;
    public $Carts;
    public $Pages;
    public $CartProducts;
    public $Mockups;


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
        Mockups $Mockups
    )
    {
        $this->Request = $Request;
        $this->Carts = $Carts;
        $this->Pages = $Pages;
        $this->CartProducts = $CartProducts;
        $this->Mockups = $Mockups;

        //$this->middleware('auth');
        $this->Data["menus"] = $this->Pages->get_menus();
    }

    public function cart()
    {
        $this->Data["Produts"] = $this->CartProducts->all();
        $this->Data["BillingInformaion"] = [
            "Price" => 0,
            "Quantity" => 0
        ];
        foreach ($this->Data["Produts"] as $Produts) {
            $this->Data["BillingInformaion"]["Price"] = $this->Data["BillingInformaion"]["Price"] + $Produts->price;
            $this->Data["BillingInformaion"]["Quantity"] = $this->Data["BillingInformaion"]["Quantity"] + 1; 
        }

        return view('home.user.cart', $this->Data);
    }

    //
    public function add_to_cart()
    {
        //$this->Request->session()->flush();

        $Cart = $this->Request->session()->get('Cart', null);
        if(empty($Cart)){
            $CartKey = md5(microtime().rand());
            $this->Carts->key = $CartKey;
            $this->Carts->checkout = 0;
            $this->Carts->save();
            $CartId = $this->Carts->id;
            $this->Request->session()->put("Cart",['Key'=> $CartKey, 'Id' => $CartId]);
        }else{
            $CartKey = $Cart['Key'];
            $CartId = $Cart['Id'];
        }

        $ProductId = $this->Request->ProductId;
        $Mockups = $this->Mockups->where('id',$ProductId)->first();;
        $this->CartProducts->cart_id = $CartId;
        $this->CartProducts->product_id = $ProductId;
        $this->CartProducts->name = $Mockups->name;
        $this->CartProducts->description = $Mockups->description;
        $this->CartProducts->price = $Mockups->price;
        $this->CartProducts->category_id = $Mockups->category_id;
        $this->CartProducts->slug = $Mockups->slug;
        $this->CartProducts->save();

        $Data = [
            "response" => "success",
            "key" => "",
            "data" => $Mockups
        ];
        return response($Data, 200)->header('Content-Type', 'application/json');
    }

    public function remove_from_cart()
    {
        $CartItemId = $this->Request->input('CartItemId');
        $Data = [
            "status" => "success",
            "cartItemId" => $CartItemId
        ];
        return response($Data, 200)->header('Content-Type', 'application/json');
    }
}
