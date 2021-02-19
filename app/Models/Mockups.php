<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;


class Mockups extends Model
{
    use HasFactory;
    use SoftDeletes;
    
    public $MockupsTable = "mockups";

    public function by_groups()
    {
        $Showcases = DB::table($this->MockupsTable)
                    ->select('mockups.id',
                                'price',
                                'mockups.name as mockup_name',
                                'author',
                                'mockup_categories.name as category_name'
                            )
                    ->where('mockups.deleted_at', NULL)
                    ->leftJoin('mockup_categories', $this->MockupsTable.'.id', '=', 'mockup_categories.id')
                    ->get();
        return $Showcases;
    }
    public function by_groups_deleted()
    {
        $Showcases = DB::table($this->MockupsTable)
                    ->select('mockups.id',
                                'price',
                                'mockups.name as mockup_name',
                                'author',
                                'mockup_categories.name as category_name'
                            )
                    ->where('mockups.deleted_at', '!=' , null )
                    ->leftJoin('mockup_categories', $this->MockupsTable.'.id', '=', 'mockup_categories.id')
                    ->get();
        return $Showcases;
    }
}
