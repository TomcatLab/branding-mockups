<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Carts extends Model
{
    use HasFactory;

    public function get_cart_products($cart_id)
    {
        $Items = DB::table('cart_products')
                        ->select('cart_id',
                                 'cart_products.product_id as product_id',
                                 'mockups.name',
                                 'mockups.keywords',
                                 'mockups.description',
                                 'mockups.price',
                                 'mockups.category_id',
                                 'mockups.slug',
                                 'mockup_images.full_url',
                                 'mockup_categories.name as category_name'
                                )
                        ->where('cart_id', $cart_id)
                        //->where('deleted_at',null)
                        ->leftJoin('mockups', 'mockups.id', '=', 'cart_products.product_id')
                        ->leftJoin('mockup_images', 'mockups.id', '=', 'mockup_images.mockup_id')
                        ->leftJoin('mockup_categories', 'mockups.category_id', '=', 'mockup_categories.id')
                        ->get();
        return $Items;
    }

    public function is_exist($cart_id)
    {
        //$user = User::where('presentations', '=', Input::get('email'))->first();
        $carts =  DB::table("carts")
                            ->where('id', $cart_id)
                            ->count();
        return $carts ? true : false;
    }
}
