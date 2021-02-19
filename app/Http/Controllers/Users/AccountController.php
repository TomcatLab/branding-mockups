<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pages;
use Auth;


class AccountController extends Controller
{
    //
    public $Request;
    public $Pages;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(
        Pages $Pages,
        Request $Request
    )
    {
        $this->Request = $Request;
        $this->Pages = $Pages;
        
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
            ]
        ];
        return view('home.user.myaccount', $this->Data);
    }

}
