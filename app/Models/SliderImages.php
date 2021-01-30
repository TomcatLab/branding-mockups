<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Sliders;
use Illuminate\Support\Facades\DB;

class SliderImages extends Model
{
    use HasFactory;

    public $Sliders;

    public function __construct(Sliders $Sliders){
        $this->Sliders = $Sliders;
    }

    public function get_slider_images()
    {
        $Sliders = $this->Sliders->all();
        $SliderImages = [];
        foreach($Sliders as $Slider){
            $SliderImages[$Slider->id] = $this->by_slider($Slider->id);
        }
        return $SliderImages;
    }
    public function by_slider(Int $SliderId = null)
    {
        $SliderImages = [];
        if(is_numeric($SliderId)){
            $SliderImages = DB::table("slider_images")
                            ->where('slider_id',$SliderId)
                            ->get();
            if(!($SliderImages->count())){
                $SliderImages = [];
            }
        }
        return $SliderImages;
    }
}
