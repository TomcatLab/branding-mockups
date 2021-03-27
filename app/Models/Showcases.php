<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;


class Showcases extends Model
{
    use HasFactory;
    use SoftDeletes;
    public $ShowcasesTable = "showcases";

    public function with_group()
    {
        $Showcases = DB::table($this->ShowcasesTable)
            ->select('showcases.id',
                     'label',
                     'user',
                     'behance_url',
                     'image_full_path',
                     'mockup_categories.name as category_name'
                    )
            ->where('showcases.deleted_at', null)
            ->leftJoin('mockup_categories', $this->ShowcasesTable.'.id', '=', 'mockup_categories.id')
            ->get();
        return $Showcases;
    }

    public function soft_delete(int $ShowcaseId = null)
    {
        $timestamp = date('Y-m-d H:i:s');

        DB::table($this->ShowcasesTable)
            ->where('id', $ShowcaseId)->delete();
    }
}
