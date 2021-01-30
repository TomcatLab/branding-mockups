<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Banners;
use Illuminate\Support\Facades\DB;

class BannerImages extends Model
{
    use HasFactory;


    public $Banners;

    public function __construct(Banners $Banners){
        $this->Banners = $Banners;
    }

    public function get_banner_image()
    {
        $Banners = $this->Banners->all();
        $BannerImages = [];
        foreach($Banners as $Banner){
            $BannerImages[$Banner->id] = $this->by_slider($Banner->id);
        }
        return $BannerImages;
    }

    public function by_slider(Int $BannerId = null)
    {
        $BannerImages = [];
        if(is_numeric($BannerId)){
            $BannerImages = DB::table("banner_images")
                            ->where('banner_id',$BannerId)
                            ->latest('created_at')
                            ->first();
            // if(isset($BannerImages->id)){
            //     $BannerImages = [];
            // }
        }
        return $BannerImages;
    }
}
