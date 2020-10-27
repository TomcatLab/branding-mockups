<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PageTypes;
use App\Models\PageGroups;
use App\Models\Pages;
use App\Models\PageContent;


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
        $ValidatedData = $this->Request->validate([
            'page-name' => 'required|max:100',
        ]);
        
        
        if ($Validator->fails()) {
            return redirect('admin.cms.page-list')
                        ->withErrors($Validator)
                        ->withInput();
        }else{
            
            $PageName = $this->Request->input('page-name');
            $PageParentId = $this->Request->input('parent-page');
            $PageCategoryId = $this->Request->input('category');
            $PageKeywords = $this->Request->input('keywords');
            $pageDescription = $this->Request->input('description');

            $data = [
                "pg_name" => $PageName,
                "pg_parent_id" => $PageParentId,
                "pg_category_id" => $PageCategoryId,
                "pg_keywords" => $PageKeywords,
                "pg_description" => $pageDescription,
                "pg_status" => 1
            ];
    
            $this->Cms->add($data);
            return redirect()->route('admin.cms.page-list');    
        }
    }

    public function page($id = null)
    {
        $this->Data['PageId'] = $id;
        $this->Data['Resources'] =[
            "PageContent" => $this->PageContent->find($id)->get()
        ];
        //return $this->Data['Resources']['PageContent'][0]->content_value;
        return view('dashboard.pages.page', $this->Data);
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
