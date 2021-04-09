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
    public function new_orders()
    {
        $orders = DB::table('orders')->select('id', 'created_at')
            ->get()
            ->groupBy(function($date) {
                //return Carbon::parse($date->created_at)->format('Y'); // grouping by years
                return Carbon::parse($date->created_at)->format('m'); // grouping by months
            });

        $ordermcount = [];
        $orderArr = [];

        foreach ($orders as $key => $value) {
            $ordermcount[(int)$key] = count($value);
        }

        for($i = 1; $i <= 12; $i++){
            if(!empty($ordermcount[$i])){
                $orderArr[$i] = $ordermcount[$i];    
            }else{
                $orderArr[$i] = 0;
            }
        }

        return $orderArr ;
    }
}
