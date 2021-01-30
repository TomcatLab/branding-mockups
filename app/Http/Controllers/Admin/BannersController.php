<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Banners;
use App\Models\BannerImages;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use File;
use Intervention\Image\ImageManagerStatic as Image;

class BannersController extends Controller
{
    public $Banners;
    public $Request;
    public $BannerImages;

    public function __construct(
        Banners $Banners,
        Request $Request,
        BannerImages $BannerImages
    ){
        $this->Banners = $Banners;
        $this->Request = $Request;
        $this->BannerImages = $BannerImages;
    }
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
                        "target" => "newBannerModal"
                    ]
                ]
            ],
        ];

        $this->Data["Resources"] = [
            "Banners" => $this->Banners->all(),
            "BannerImages" => $this->BannerImages->get_banner_image()
        ];
        
        return view("dashboard.pages.banner", $this->Data);
    }

    public function add()
    {
        $ValidatedRules = [
            'BannerName' => 'required'
        ];

        $Validator = Validator::make($this->Request->all(), $ValidatedRules, []);

        if ($Validator->fails()) {
            return redirect('admin.cms.banner-list')
                        ->withErrors($Validator)
                        ->withInput();
        }else{
            
            $BannerName = $this->Request->input('BannerName');
            $Key = Str::of(Str::lower($BannerName))->replace(' ', '-');

            $this->Banners->name = $BannerName;
            $this->Banners->key = $Key;
            $this->Banners->save();

            return redirect()->route('admin.cms.banner-list');
        }
    }

    public function add_image()
    {
        $ValidatedRules = [
            //'BannerImage' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'BannerId' => 'required'
        ];

        $ImageName = time().'.'.$this->Request->BannerImage->extension();
        $BannerId = $this->Request->input('BannerId');
        $BannerPathUploadPath = public_path('users/assets/images/banners/'.$BannerId);
        $BannerPathUploadThumb = public_path('users/assets/images/banners/'.$BannerId.'/thumb');
        $BannerPath = 'users/assets/images/banners/'.$BannerId;


        if (!file_exists($BannerPathUploadPath)) {
            File::makeDirectory($BannerPathUploadPath);
        }
        if (!file_exists($BannerPathUploadThumb)) {
            File::makeDirectory($BannerPathUploadThumb);
        }

        $this->Request->BannerImage->move($BannerPathUploadPath, $ImageName);
    
        $image_resize = Image::make($BannerPathUploadPath."/".$ImageName);

        $image_resize->resize(300, null, function ($constraint) {
            $constraint->aspectRatio();
        });

        $image_resize->save($BannerPathUploadThumb."/".$ImageName);

        $Validator = Validator::make($this->Request->all(), $ValidatedRules, []);

        if ($Validator->fails()) {
            return redirect('admin.cms.banner-list')
                        ->withErrors($Validator)
                        ->withInput();
        }else{
            
            $this->BannerImages->url = $BannerPath."/".$ImageName;
            $this->BannerImages->thumb = $BannerPath."/thumb/".$ImageName;
            $this->BannerImages->filename = $ImageName;
            $this->BannerImages->banner_id = $BannerId;
            $this->BannerImages->save();

            return redirect()->route('admin.cms.banner-list');
        }
    }
}
