<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SlidesController extends Controller
{
    //
    public function index()
    {
        $this->Data['page'] = [
            "header" => [
                "style" => "regular",
                "label" => "Sliders",
                "buttons" => [
                    [
                        "label" => "Add slider",
                        "style" => "primary",
                        "action" => "model",
                        "icon" => "file-plus",
                        "target" => ""
                    ]
                ]
            ],
        ];

        return view("dashboard.pages.slides", $this->Data);
    }
}
