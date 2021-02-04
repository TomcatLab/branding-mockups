<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\Mockups;
use App\Models\FileExtensions;
use App\Models\MockupCategories;
use App\Http\Controllers\Controller;
use App\Http\Controllers\ImageUploadController;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use File;
use Intervention\Image\ImageManagerStatic as Image;


class MockupsController extends Controller
{

    public $Request;
    public $Mockups;
    public $FileExtensions;
    public $MockupCategories;


    public function __construct(
        Request $Request,
        Mockups $Mockups,
        MockupCategories $MockupCategories,
        FileExtensions $FileExtensions
    )
    {
        $this->Request = $Request;
        $this->Mockups = $Mockups;
        $this->FileExtensions = $FileExtensions;
        $this->MockupCategories = $MockupCategories;

    }

    //
    public function index()
    {
        $this->Data['page'] = [
            "header" => [
                "style" => "regular",
                "label" => "Mockups",
                "buttons" => [
                    [
                        "style" => "info",
                        "action" => "link",
                        "label" => "Add New",
                        "icon" => "aperture",
                        "link" => "admin/products/mockups-new"
                    ],
                    [
                        "label" => "Add Category",
                        "style" => "primary",
                        "action" => "model",
                        "icon" => "file-plus",
                        "target" => "newGroupModal"
                    ],
                    [
                        "label" => "Add Extension",
                        "style" => "primary",
                        "action" => "model",
                        "icon" => "file-plus",
                        "target" => "newExtensionModal"
                    ]
                ]
            ]
        ];
        $this->Data['resources'] = [
            "Mockups" => $this->Mockups->by_groups()
        ];
        return view('dashboard.pages.mockups.all', $this->Data);
    }

    public function new()
    {
        $this->Data['Resources'] = [
            "MockupCategories" => $this->MockupCategories->all(),
            "FileExtensions" => $this->FileExtensions->all()
        ];
        
        return view('dashboard.pages.mockups.new', $this->Data);
    }
    
    public function save($Id = null)
    {
        $ValidatedRules = [
            'MockupName' => 'required|max:100',
            //'MockupKeywords' => "",
            //'MockupDescription' => "",
            "MockupCategory" => "required",
            "MockupSlug" => "required",
            "MockupPrice" => "required",
            //"MockupInformations" => "",
            //"MockupExtension" => "",
            //'MockupImage' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ];
  
        $Validator = Validator::make($this->Request->all(), $ValidatedRules, []);

        if ($Validator->fails()) {
            return redirect('admin.products.mockups.new')
                        ->withErrors($Validator)
                        ->withInput();
        }else{
            $MockupName = $this->Request->input('MockupName');
            $MockupKeywords = $this->Request->input('MockupKeywords');
            $MockupDescription = $this->Request->input('MockupDescription');
            $MockupCategory = $this->Request->input('MockupCategory');
            $MockupSlug = $this->Request->input('MockupSlug');
            $MockupPrice = $this->Request->input('MockupPrice');
            $MockupInformations = $this->Request->input('MockupInformations');
            $MockupExtension = $this->Request->input('MockupExtension');
            $imageName = time().'.'.$this->Request->MockupImage->extension();
     
            $this->Request->MockupImage->storeAs('images', $imageName);
    
            $Data = [
                "name" => $MockupName,
                "keywords" => $MockupKeywords,
                "description" => $MockupDescription,
                "author" => "1",
                "category_id" => $MockupCategory,
                "slug" => $MockupSlug,
                "price" => $MockupPrice,
                "info" => $MockupInformations,
                "file_extension" => $MockupExtension,
                "size" => "1",
                "dimensions" => "1",
                "license" => "1",
            ];
            
            if($Id){
                $this->Mockups->where('id', $Id)->update($Data);
            }else{
                $this->Mockups->insert($Data);
            }
            
            $MockupPathUploadPath = public_path('users/assets/images/products/5');
            $MockupPathUploadThumb = public_path('users/assets/images/products/5/thumb');

            if (!file_exists($MockupPathUploadPath)) {
                File::makeDirectory($MockupPathUploadPath);
            }
            if (!file_exists($MockupPathUploadThumb)) {
                File::makeDirectory($MockupPathUploadThumb);
            }

            $this->Request->MockupImage->move($MockupPathUploadPath, $imageName);

            return redirect()->route('admin.products.mockups.list');
        }
       
    }

    public function delete()
    {
        $MockupId = $this->Request->input('MockupId');

        $Mockup = $this->Mockups->where('id',$MockupId)->first();

        if ($Mockup != null) {
            $Mockup->delete();
            redirect()->route('admin.products.mockups.list')->with(['success' => [ 'Successfully deleted!!']]);
        }
        return redirect()->route('admin.products.mockups.list');
    }

    public function new_group()
    {
        $ValidatedRules = array(
            'GroupName' => 'required',
        );

        $Validator = Validator::make($this->Request->all(), $ValidatedRules, []);

        if ($Validator->fails()) {
            return redirect()->route('admin.products.mockups.list')
                                ->withErrors($Validator)
                                ->withInput($this->Request->input());
        }else{
            $GroupName = $this->Request->input('GroupName');
            $Data = [
                "name" => $GroupName
            ];
            $this->MockupCategories->insert($Data);
    
            $Messages = [
                "success" => [
                    "Successfully Updated"
                ]
            ];
            return redirect()->route('admin.products.mockups.list')->with($Messages);
        }

    }

    public function new_extension()
    {
        $ValidatedRules = array(
            'ExtensionName' => 'required',
        );

        $Validator = Validator::make($this->Request->all(), $ValidatedRules, []);

        if ($Validator->fails()) {
            return redirect()->route('admin.products.mockups.list')
                                ->withErrors($Validator)
                                ->withInput($this->Request->input());
        }else{
            $ExtensionName = $this->Request->input('ExtensionName');
            $Data = [
                "name" => $ExtensionName
            ];
            $this->FileExtensions->insert($Data);
    
            $Messages = [
                "success" => [
                    "Successfully Updated"
                ]
            ];
            return redirect()->route('admin.products.mockups.list')->with($Messages);
        }

    }
    
    public function trash()
    {
        $this->Data['page'] = [
            "header" => [
                "style" => "regular",
                "label" => "Mockups Trash",
                "buttons" => [
                    // [
                    //     "style" => "info",
                    //     "action" => "link",
                    //     "label" => "Add New",
                    //     "icon" => "aperture",
                    //     "link" => "#"
                    // ]
                ]
            ]
        ];
        $this->Data['Resources'] = [

        ];
        return view('dashboard.pages.mockups.trash', $this->Data);
    }
}
