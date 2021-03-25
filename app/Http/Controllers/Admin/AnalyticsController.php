<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use Auth;


class AnalyticsController extends Controller
{
    public $User;
    public $Request;

    public function __construct(
        User $User,
        Request $Request
    ){
        $this->Users = $User;
        $this->Request = $Request;
        $this->middleware('admin');
    }
    
    //
    public function index()
    {
        $this->Data['page'] = [
            "header" => [
                "style" => "regular",
                "label" => "Analytics",
                "buttons" => []
            ]
        ];
        $this->Data['data'] = [
            "customers" => $this->new_customers(),
        ];

        return view('dashboard.pages.analytics', $this->Data);
    }

    public function new_customers(Type $var = null)
    {
        $monthsCustomer = $this->Users->new_customers();
        $currentMonth = ltrim(date('m'),'0');
        $lastMonth = $currentMonth - 1 ? $currentMonth - 1 : 12;

        $currentMonthCustomer =  $monthsCustomer[$currentMonth];
        $statusNumber = $monthsCustomer[$currentMonth] - $monthsCustomer[$lastMonth];
        
        if($monthsCustomer[$currentMonth] > $monthsCustomer[$lastMonth]){
            $status = "up";
        }else{
            $status = "down";
        }
        
 
        return [
            "new" => $currentMonthCustomer,
            "status" => $status,
            "statusNumber" => $statusNumber,
            "all" => $monthsCustomer,
            "allJson" => implode(",",$monthsCustomer),
        ];
    }

    public function new_orders()
    {
        # code...
    }
}
