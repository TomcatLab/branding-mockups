<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

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
