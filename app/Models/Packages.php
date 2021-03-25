<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Packages extends Model
{
    use HasFactory;

    public function get_package($Product_id)
    {
        $Product = null;
        if(is_numeric($Product_id)){
            $Product = DB::table('packages')->where('mockup_id', $Product_id)->first();
        }
        return $Product;
    }
}
