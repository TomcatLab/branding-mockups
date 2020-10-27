<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Emails extends Model
{
    use HasFactory;

    public function Set($EmailId, $Data)
    {
        DB::table('emails')
            ->where('id', $EmailId)
            ->update($Data);
    }
}