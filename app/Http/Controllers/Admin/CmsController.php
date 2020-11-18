<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\PageTypes;
use App\Models\PageGroups;
use App\Models\Pages;
use App\Models\PageContent;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;
use Illuminate\Support\Str;


class CmsController extends Controller
{
    public $Request;
    public $Cms;
    public $PageTypes;
    public $PageGroups;
    public $Pages;
    public $PageContent;

    public function __construct(
        Request $request,
        PageTypes $PageTypes,
        PageGroups $PageGroups,
        Pages $Pages,
        PageContent $PageContent
    )
    {
        $this->Request = $request;
        $this->PageTypes = $PageTypes;
        $this->PageGroups = $PageGroups;
        $this->Pages = $Pages;
        $this->PageContent = $PageContent;
    }

    public function index()
    {
        $this->Data['page'] = [
            "header" => [
                "style" => "regular",
                "label" => "Pages",
                "buttons" => [
                    [
                        "label" => "New Page",
                        "style" => "primary",
                        "action" => "model",
                        "icon" => "file-plus",
                        "target" => "newPageModal"
                    ],
                    [
                        "label" => "New Group",
                        "style" => "primary",
                        "action" => "model",
                        "icon" => "file-plus",
                        "target" => "newGroupModal"
                    ]
                ]
            ],
        ];
        $this->Data['Resource'] = [
            "Pages" => $this->Pages->by_groups(),
            "Groups" => $this->PageGroups->all(),
            "PageTypes" => $this->PageTypes->all(),
            "AllPages" => []
        ];
        return view('dashboard.pages.cms', $this->Data);
    }

    public function add()
    {
        $ValidatedRules = [
            'PageName' => 'required',
            'PageSlug' => 'required'
        ];
        
        $Validator = Validator::make($this->Request->all(), $ValidatedRules, []);
        
        if ($Validator->fails()) {
            return redirect('admin.cms.page-list')
                        ->withErrors($Validator)
                        ->withInput();
        }else{
            
            $PageName = $this->Request->input('PageName');
            $PageParentId = $this->Request->input('ParentPage');
            $PageGroupId = $this->Request->input('Group');
            $PageKeywords = $this->Request->input('Keywords');
            $PageDescription = $this->Request->input('Description');
            $PageType = $this->Request->input('Type');
            $PageSlug = $this->Request->input('PageSlug');

            $this->Pages->name = $PageName;
            $this->Pages->parent_id = $PageParentId;
            $this->Pages->group_id = $PageGroupId;
            $this->Pages->keywords = $PageKeywords;
            $this->Pages->description = $PageDescription;
            $this->Pages->type_id = $PageType;
            $this->Pages->slug = Str::of(Str::lower($PageSlug))->replace(' ', '-');
            $this->Pages->save();

            $this->PageContent->page_id = $this->Pages->id;

            //$this->PageContent->insert($Data);
            $this->PageContent->save();

            return redirect()->route('admin.cms.page-list',$this->PageContent->id);
        }
    }

    public function page($id = null)
    {
        $this->Data['PageId'] = $id;
        $this->Data['Resources'] =[
            "PageContent" => $this->PageContent->where('id',$id)->first()
        ];
        //return $this->Data['Resources']['PageContent'][0]->content_value;
        return view('dashboard.pages.page', $this->Data);
    }

    public function new_group()
    {
        $ValidatedRules = array(
            'GroupName' => 'required',
        );

        $Validator = Validator::make($this->Request->all(), $ValidatedRules, []);

        if ($Validator->fails()) {
            return redirect()->route('admin.cms.page-list')
                                ->withErrors($Validator)
                                ->withInput($this->Request->input());
        }else{
            $GroupName = $this->Request->input('GroupName');
            $Data = [
                "name" => $GroupName,
                "key"  => strtolower(str_replace(" ","-",$GroupName))
            ];
            $this->PageGroups->insert($Data);
    
            $Messages = [
                "success" => [
                    "Successfully Updated"
                ]
            ];
            return redirect()->route('admin.cms.page-list')->with($Messages);
        }

    }

    public function trash()
    {
        
        $this->data['page'] = [
            "header" => [
                "style" => "regular",
                "label" => "Pages",
                "buttons" => [
                    [
                        "label" => "New Page",
                        "style" => "primary",
                        "action" => "model",
                        "icon" => "file-plus",
                        "target" => "newPageModal"
                    ]
                ]
            ],
            "data" => [
                "pages" => $this->Cms->pages(),
                "categories" => $this->Cms->categories()
            ]
        ];
        return view('dashboard.pages.cms', $this->data);
    }
}
