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
                "Pages" => $this->by_group($Group->id)
            ];
        }
        return $PageByGroups;
    }

    public function by_group($GroupId = null)
    {
        $PagesByGroup = [];
        if(is_numeric($GroupId)){
            $PagesByGroup = DB::table($this->PagesTable)
                            ->select(
                                $this->PagesTable.".name",
                                $this->PagesTable.".keywords",
                                $this->PagesTable.".description",
                                $this->PagesTable.".parent_id",
                                $this->PagesTable.".group_id",
                                $this->PagesTable.".type_id",
                                "page_contents.id",
                                "page_contents.value",
                                "page_contents.styles"
                            )
                            ->leftJoin('page_contents', $this->PagesTable.'.id', '=', 'page_id')
                            ->where('group_id',$GroupId)
                            ->get();
        }
        return $PagesByGroup;
    }

    public function by_slug($Slug)
    {
        $Page = DB::table($this->PagesTable)
        ->select(
            $this->PagesTable.".name",
            $this->PagesTable.".slug",
            $this->PagesTable.".keywords",
            $this->PagesTable.".description",
            $this->PagesTable.".parent_id",
            $this->PagesTable.".group_id",
            $this->PagesTable.".type_id",
            "page_contents.id",
            "page_contents.value",
            "page_contents.styles"
        )
        ->leftJoin('page_contents', $this->PagesTable.'.id', '=', 'page_id')
        ->where($this->PagesTable.".slug",$Slug)
        ->get();

        return $Page;
    }
}
