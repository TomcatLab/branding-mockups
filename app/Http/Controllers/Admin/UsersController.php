<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;


class UsersController extends Controller
{
    public $User;

    public function __construct(
        User $User
    )
    {
        $this->User = $User;
    }

    //
    public function index()
    {
        $this->Data['Resources'] = [
            "Users" => $this->User->get_users()
        ];
        return view('dashboard.pages.users', $this->Data);
    }
    
    public function trash()
    {
        $this->Data['Resources'] = [
            "Users" => $this->User->get_users()
        ];
        return view('dashboard.pages.users', $this->Data);
    }
}
