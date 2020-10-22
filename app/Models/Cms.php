<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Cms extends Model
{
    use HasFactory;
    public $PagesTable = "Pages";
    public $CategoriesTable = "PageCategories";

    public function Pages()
    {
        $PageData = [];
        $Categories = $this->Categories();
        foreach($Categories as $key => $Category){
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

    public function Categories()
    {
        $Categories =  DB::table($this->CategoriesTable)
                            ->where('pct_status', 1)
                            ->get();
        return $Categories;
    }

    public function add($Data)
    {
        DB::table($this->PagesTable)->insert(
            $Data
        );
        return true;
    }
}
