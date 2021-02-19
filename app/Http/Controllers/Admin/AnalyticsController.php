<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use Carbon\Carbon;


class AnalyticsController extends Controller
{
    public $User;

    public function __construct(
        User $User
    ){
        $this->Users = $User;
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
            "newCustomers" => $this->Users->new_customers()
        ];

        return view('dashboard.pages.analytics', $this->Data);
    }
}
