<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\PageTypes;
use App\Models\PageGroups;
use App\Models\Pages;
use App\Models\PageContent;
use App\Models\PageBlocks;
use App\Models\Sliders;
use App\Models\Banners;
use App\Models\PageComponents;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
use File;

class CmsController extends Controller
{
    public $Request;
    public $Cms;
    public $PageTypes;
    public $PageGroups;
    public $Pages;
    public $PageContent;
    public $PageBlocks;
    public $PageComponents;
    public $Sliders;
    public $Banners;

    public function __construct(
        Request $request,
        PageTypes $PageTypes,
        PageGroups $PageGroups,
        Pages $Pages,
        PageContent $PageContent,
        PageBlocks $PageBlocks,
        PageComponents $PageComponents,
        Sliders $Sliders,
        Banners $Banners
    )
    {
        $this->Request = $request;
        $this->PageTypes = $PageTypes;
        $this->PageGroups = $PageGroups;
        $this->Pages = $Pages;
        $this->PageContent = $PageContent;
        $this->PageBlocks = $PageBlocks;
        $this->PageComponents = $PageComponents;
        $this->Sliders = $Sliders;
        $this->Banners = $Banners;
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
                        "action" => "link",
                        "icon" => "file-plus",
                        "link" => "admin/cms/page-new-prop"
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
        return view('dashboard.pages.cms.cms', $this->Data);
    }

    public function new_page_prop($id = null)
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
            "Sliders" => $this->Sliders->all(),
            "Banners" => $this->Banners->all(),
            "PageId" => $id,
            "Page" => $id ? $this->Pages->where("id",$id)->first() : null,
            "AllPages" => []
        ];
        if($id)
            return view('dashboard.pages.cms.edit', $this->Data);
        else
            return view('dashboard.pages.cms.new', $this->Data);

    }

    public function add_prop()
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
            $PageHome = $this->Request->input('Home');
            $PageSlider = $this->Request->input('slider');
            $PageBanner = $this->Request->input('Banner');

            if($PageHome)
                $this->Pages->where('home', 1)->update(['home' => null]);

            $this->Pages->name = $PageName;
            $this->Pages->parent_id = $PageParentId;
            $this->Pages->group_id = $PageGroupId;
            $this->Pages->keywords = $PageKeywords;
            $this->Pages->description = $PageDescription;
            $this->Pages->type_id = $PageType;
            if($PageHome)
                $this->Pages->home = 1;

            if($PageSlider)
                $this->Pages->slider_id = $PageSlider;
            
            if($PageBanner)
                $this->Pages->banner_id = $PageBanner;

            $this->Pages->slug = Str::of(Str::lower($PageSlug))->replace(' ', '-');
            $this->Pages->save();

            $this->PageContent->page_id = $this->Pages->id;

            //$this->PageContent->insert($Data);
            $this->PageContent->save();

            File::copy(
                public_path('../resources/views/home/origins/page.blade.php'),
                public_path('../resources/views/home/pages/'.$this->Pages->slug.'.blade.php'
            ));

            return redirect()->route('admin.cms.page-list',$this->PageContent->id);
        }
    }

    public function page($id = null)
    {
        $this->Data['PageId'] = $id;
        $this->Data['Resources'] =[
            "PageContent" => $this->PageContent->where('id',$id)->first(),
            "PageBlocks" => $this->PageBlocks->all(),
            "BlockContents" => null
        ];
        foreach ($this->Data['Resources']['PageBlocks'] as $key => $block) {
            if($block->filename){
                $this->Data['Resources']['BlockContents'][$block->id] = file_get_contents(public_path('../resources/views/home/blocks/'.$block->filename.'.blade.php'));
            }
        }
        return view('dashboard.pages.page', $this->Data);
    }

    public function ajax_save($id = null){
        $ValidatedRules = [
            'gjs-html' => 'required',
            'gjs-styles' => 'required'
        ];
        
        $Validator = Validator::make($this->Request->all(), $ValidatedRules, []);
        
        if ($Validator->fails()) {
            return false;
        }else{
            
            $Content = $this->Request->input('gjs-html');
            $Styles = $this->Request->input('gjs-styles');

            $Data = [
                "value" => $Content,
                "styles" => $Styles,
                "publish" => 1
            ];
            $this->PageContent->where('id', $id)->update($Data);

            return true;
        }
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

    public function publish($id = null)
    {
        $PageContent = $this->PageContent->where('id',$id)->first();
        $Page = $this->Pages->by_id($PageContent->page_id);
        $PageContentOut = null;
        $Content = $PageContent->value ? $PageContent->value : null;

        $Origin = file_get_contents(public_path('../resources/views/home/origins/page.blade.php'));
        $Path = public_path('../resources/views/home/pages/'.$Page->slug.'.blade.php');

        $PageContentOut = str_replace("[REPLACE_CONTENT]", $Content, $Origin);

        $Components = $this->PageComponents->all();
        foreach ($Components as $key => $Component) {
            $ComponentContent = file_get_contents(public_path('../resources/views/home/components/'.$Component->filename.'.blade.php'));
            $PageContentOut = str_replace("[".$Component->key."]", $ComponentContent, $PageContentOut);
        }

        File::put($Path,$PageContentOut);

        $Data = [
            "publish" => 0
        ];
        $this->PageContent->where('id', $id)->update($Data);

        return redirect()->route('admin.cms.page-list');
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
