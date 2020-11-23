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
                                $this->PagesTable.".id as page_id",
                                $this->PagesTable.".name",
                                $this->PagesTable.".keywords",
                                $this->PagesTable.".description",
                                $this->PagesTable.".parent_id",
                                $this->PagesTable.".group_id",
                                $this->PagesTable.".type_id",
                                $this->PagesTable.".slider_id",
                                "page_contents.id",
                                "page_contents.value",
                                "page_contents.styles"
                            )
                            ->leftJoin('page_contents', $this->PagesTable.'.id', '=', 'page_id')
                            ->where('group_id',$GroupId)
                            ->where('type_id', "!=", 3)
                            ->get();
            if(!($PagesByGroup->count())){
                $PagesByGroup = [];
            }
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
                        $this->PagesTable.".slider_id",
                        "page_contents.id",
                        "page_contents.value",
                        "page_contents.styles"
                    )
                    ->leftJoin('page_contents', $this->PagesTable.'.id', '=', 'page_id')
                    ->where($this->PagesTable.".slug",$Slug)
                    ->first();

        return $Page;
    }

    public function get_menus()
    {
        $Menus = [];
        $PageByGroups = [];

        $PageGroups = $this->PageGroups->all();
        foreach($PageGroups as $key => $Group){
            $menus = DB::table($this->PagesTable)
                        ->select(
                            $this->PagesTable.".name",
                            $this->PagesTable.".slug",
                            $this->PagesTable.".parent_id",
                            "page_types.id as page_type_id",
                            "page_types.name as page_type",
                            "page_types.action"
                        )
                        ->leftJoin('page_types', $this->PagesTable.'.id', '=', 'page_types.id')
                        ->where('group_id',$Group->id)
                        ->where('type_id', "!=", 3)
                        ->get();

            $Menus[$Group->key] = [
                "Group" => $Group,
                "Pages" => $menus
            ];
        }

        return $Menus;
    }

    public function get_home_page()
    {
        $Page = DB::table($this->PagesTable)
                    ->select(
                        $this->PagesTable.".name",
                        $this->PagesTable.".slug",
                        $this->PagesTable.".keywords",
                        $this->PagesTable.".description",
                        "page_contents.id",
                        "page_contents.value",
                        "page_contents.styles"
                    )
                    ->leftJoin('page_contents', $this->PagesTable.'.id', '=', 'page_id')
                    ->where($this->PagesTable.".home",1)
                    ->first();

        return $Page;
    }
}
