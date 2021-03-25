<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\Sliders;
use App\Models\SliderImages;
use App\Models\PageContent;
use File;


class SlidesController extends Controller
{
    public $Sliders;
    public $Request;
    public $SliderImages;

    public function __construct(
        Sliders $Sliders,
        Request $Request,
        SliderImages $SliderImages
        ){
        $this->Sliders = $Sliders;
        $this->Request = $Request;
        $this->SliderImages = $SliderImages;
        $this->middleware('admin');
    }
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
                        "target" => "newSlideModal"
                    ]
                ]
            ],
        ];

        $this->Data["Resources"] = [
            "Sliders" => $this->Sliders->all(),
            "SliderImages" => $this->SliderImages->get_slider_images()
        ];

        //return $this->Data;
        return view("dashboard.pages.slides", $this->Data);
    }

    public function add()
    {
        $ValidatedRules = [
            'SliderName' => 'required'
        ];

        $Validator = Validator::make($this->Request->all(), $ValidatedRules, []);

        if ($Validator->fails()) {
            return redirect('admin.cms.slide-list')
                        ->withErrors($Validator)
                        ->withInput();
        }else{
            
            $SliderName = $this->Request->input('SliderName');
            $Key = Str::of(Str::lower($SliderName))->replace(' ', '-');

            $this->Sliders->name = $SliderName;
            $this->Sliders->key = $Key;
            $this->Sliders->save();

            return redirect()->route('admin.cms.slide-list');
        }
    }

    public function add_image(Request $Request)
    {
        $ValidatedRules = [
            //'SliderImage' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'SliderId' => 'required'
        ];

        $ImageName = time().'.'.$this->Request->SliderImage->extension();
        $SliderId = $this->Request->input('SliderId');
        $SliderPathUploadPath = public_path('users/assets/images/slides/'.$SliderId);
        $SliderPath = 'users/assets/images/slides/'.$SliderId;


        if (!file_exists($SliderPathUploadPath)) {
            File::makeDirectory($SliderPathUploadPath);
        }

        $this->Request->SliderImage->move($SliderPathUploadPath, $ImageName);

        $Validator = Validator::make($this->Request->all(), $ValidatedRules, []);

        if ($Validator->fails()) {
            return redirect('admin.cms.slide-list')
                        ->withErrors($Validator)
                        ->withInput();
        }else{
            
            $this->SliderImages->url = $SliderPath."/".$ImageName;
            $this->SliderImages->slider_id = $SliderId;
            $this->SliderImages->save();

            return redirect()->route('admin.cms.slide-list');
        }
    }
}
