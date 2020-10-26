<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AnalyticsController extends Controller
{
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
        return view('dashboard.pages.analytics', $this->Data);
    }
}
