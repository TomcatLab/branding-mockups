<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;


class PageTypes extends Model
{
    use HasFactory;

    public function Types()
    {
        $Types =  DB::table("page_types")
                    ->where('pgt_status', 1)
                    ->get();
        return $Types;
    }
}
