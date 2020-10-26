<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\PageGroups;
use Illuminate\Support\Facades\DB;


class Pages extends Model
{
    use HasFactory;
    
    public $PageGroups;
    public $PagesTable = "pages";

    public function __construct(
        PageGroups $PageGroups
    )
    {
        $this->PageGroups = $PageGroups;
    }

    public function by_groups()
    {
        $PageByGroups = [];
        $PageGroups = $this->PageGroups->all();

        foreach($PageGroups as $key => $Group){
            $PageByGroups[$key] = [
                "Group" => $Group,
                "Pages" => $this->by_group($Group->group_id)
            ];
        }
        return $PageByGroups;
    }

    public function by_group($GroupId = null)
    {
        $PagesByGroup = [];
        if(is_numeric($GroupId)){
            $PagesByGroup = DB::table($this->PagesTable)
                                ->where('page_group_id',$GroupId)
                                ->get();
        }
        return $PagesByGroup;
    }
}
