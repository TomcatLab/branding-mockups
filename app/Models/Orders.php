<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Support\Facades\DB;


class Orders extends Model
{
    use HasFactory;

    public function get_orders($UserId = null)
    {
        if($UserId){
            $Orders = DB::table('orders')
                        ->select(
                            'name',
                            'description',
                            'full_url',
                            'packages.id as package_id'
                        )
                        ->where('user_id',$UserId)
                        ->leftJoin('packages', 'orders.package_id', '=', 'packages.id')
                        ->leftJoin('mockups', 'mockups.id', '=', 'packages.mockup_id')
                        ->leftJoin('mockup_images', 'mockups.id', '=', 'packages.id')
                        ->get();
            return $Orders;
        }
        return [];
    }
}
