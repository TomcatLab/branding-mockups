<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Carts;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;




class CartProducts extends Model
{
    use HasFactory;
    use SoftDeletes;

    public $Request;
    public $CartProductsTable = "cart_products";

    public function __construct( Request $Request)
    {
        $this->Request = $Request;
    }



    public function get_product_count($CartId = null)
    {
        $CartProducts = [];
        $CartSession = $this->Request->session()->get('Cart', null);
        if($CartId){
            $CartProducts = DB::table($this->CartProductsTable)
                            ->where('cart_id',$CartId)
                            ->all();
        }

        return count($CartProducts) ? count($CartProducts) : 0;
    }
    public function is_exist_in_cart($CartId = null, $ProductId = null)
    {
        $CartProducts = DB::table($this->CartProductsTable)
                            ->where('cart_id',$CartId)
                            ->where('product_id',$ProductId)
                            ->where('deleted_at',null)
                            ->first();
        return $CartProducts === null ? false : true;
    }
}
