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

    public function by_groups($type_id = 1)
    {
        $Showcases = DB::table($this->MockupsTable)
                    ->select('mockups.id',
                                'price',
                                'mockups.name as mockup_name',
                                'author',
                                'mockup_categories.name as category_name',
                                'full_url'
                            )
                    ->where('mockups.deleted_at', NULL)
                    ->where('mockups.type_id', $type_id)
                    ->where('mockup_images.preview', 1)
                    ->leftJoin('mockup_categories', $this->MockupsTable.'.id', '=', 'mockup_categories.id')
                    ->rightJoin('mockup_images', $this->MockupsTable.'.id', '=', 'mockup_images.id')
                    ->get();
        return $Showcases;
    }
    public function by_groups_deleted($type_id = 1)
    {
        $Showcases = DB::table($this->MockupsTable)
                    ->select('mockups.id',
                                'price',
                                'mockups.name as mockup_name',
                                'author',
                                'mockup_categories.name as category_name'
                            )
                    ->where('mockups.deleted_at', '!=' , null )
                    ->where('mockups.type_id', $type_id)
                    ->leftJoin('mockup_categories', $this->MockupsTable.'.id', '=', 'mockup_categories.id')
                    ->get();
        return $Showcases;
    }
}
