<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MockupsController extends Controller
{
    //
    public function index()
    {
        $this->data['page'] = [
            "header" => [
                "style" => "regular",
                "label" => "Mockups",
                "buttons" => [
                    [
                        "style" => "info",
                        "action" => "link",
                        "label" => "Add New",
                        "icon" => "aperture",
                        "link" => ""
                    ]
                ]
            ]
        ];
        return view('dashboard.pages.mockups', $this->data);
    }
}
