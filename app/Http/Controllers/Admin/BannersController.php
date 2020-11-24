<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BannersController extends Controller
{
    //
    public function index()
    {
        $this->Data['page'] = [
            "header" => [
                "style" => "regular",
                "label" => "Banners",
                "buttons" => [
                    [
                        "label" => "Add Banner",
                        "style" => "primary",
                        "action" => "model",
                        "icon" => "file-plus",
                        "target" => ""
                    ]
                ]
            ],
        ];
        
        return view("dashboard.pages.banner", $this->Data);
    }
}
