<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Emails extends Model
{
    use HasFactory;

    public function Get()
    {
        $Emails =  DB::table('emails')
                        ->where('eml_status', 1)
                        ->get();
        return $Emails;
    }

    public function Set($EmailId, $Data)
    {
        DB::table('emails')
            ->where('email_id', $EmailId)
            ->update($Data);
    }
}