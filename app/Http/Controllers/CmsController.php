<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cms;
use App\Models\PageTypes;

class CmsController extends Controller
{
    public $Request;
    public $Cms;
    public $PageTypes;

    public function __construct(
        Request $request,
        Cms $Cms,
        PageTypes $PageTypes
    )
    {
        $this->Request = $request;
        $this->Cms = $Cms;
        $this->PageTypes = $PageTypes;
    }

    public function index()
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
        ];
        $this->data['resource'] = [
            "pages" => $this->Cms->pages(),
            "categories" => $this->Cms->categories(),
            "PageTypes" => $this->PageTypes->Types(),
        ];
        return view('dashboard.pages.cms', $this->data);
    }

    public function add()
    {
        $ValidatedData = $this->Request->validate([
            'page-name' => 'required|max:100',
        ]);

        $PageName = $this->Request->input('page-name');
        $PageParentId = $this->Request->input('parent-page');
        $PageCategoryId = $this->Request->input('category');
        $PageKeywords = $this->Request->input('keywords');
        $pageDescription = $this->Request->input('description');
        
        if ($Validator->fails()) {
            return redirect('admin.cms.page-list')
                        ->withErrors($Validator)
                        ->withInput();
        }else{
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
        return view('dashboard.pages.page', $this->data);
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
