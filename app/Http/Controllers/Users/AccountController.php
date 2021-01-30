<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pages;


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

    public function index()
    {
        return view('home.user.myaccount', $this->Data);
    }

    public function cart()
    {
        return view('home.user.cart', $this->Data);
    }

}
