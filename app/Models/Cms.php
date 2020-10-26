<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use App\Models\PageGroups;
use App\Models\PageTypes;

class Cms extends Model
{
    use HasFactory;
    public $PagesTable = "Pages";
    public $GroupsTable = "PageGroups";

    public $PageGroups;

    public function __construct(
        PageTypes $PageTypes,
        PageGroups $PageGroups
    )
    {
        $this->PageTypes = $PageTypes;
        $this->PageGroups = $PageGroups;
    }

    public function Pages()
    {
        $PageData = [];
        $Groups = $this->PageGroups->all();
        foreach($Groups as $key => $Category){
            $PageData[$key] = [
                "CategoryId" => $Category->pct_id,
                "CategoryName" => $Category->pct_name
            ];
            // $PageData = DB::table($this->PagesTable)
            //                 ->where('pg_category_id',$Category->pct_id)
            //                 ->where('pg_status', 1)
            //                 ->get();


            // $pages[$key]['Category'] = [
            //     ['Pages'] =>  $PageData
            // ];

        }
        return $PageData;
    }

    public function add($Data)
    {
        DB::table($this->PagesTable)->insert(
            $Data
        );
        return true;
    }
}
