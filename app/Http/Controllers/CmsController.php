<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CmsController extends Controller
{
    public function index()
    {
        $this->data['page'] = [
            "header" => [
                "style" => "regular",
                "label" => "Pages",
                "buttons" => [
                    [
                        "label" => "New Page",
                        "style" => "primary",
                        "action" => "model",
                        "icon" => "file-plus",
                        "target" => "newPageModal"
                    ]
                ]
            ],
            "pages" => [
                
            ]
        ];
        return view('dashboard.pages.cms', $this->data);
    }
    public function add()
    {
        $this->data['page'] = [
            "header" => [
                "style" => "regular",
                "label" => "Edit Page",
                "buttons" => []
            ],
            "pages" => [
                
            ]
        ];
        return view('dashboard.pages.page', $this->data);
    }

    public function trash()
    {
        # code...
        return "sdf";
    }
}
