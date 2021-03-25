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
use App\Models\MockupImages;
use App\Models\Packages;
use App\Models\Presentations;
use App\Models\MockupTypes;




class MockupsController extends Controller
{

    public $Request;
    public $Mockups;
    public $FileExtensions;
    public $MockupCategories;
    public $MockupImages;
    public $Packages;
    public $Presentations;
    public $MockupTypes;

    public function __construct(
        Request $Request,
        Mockups $Mockups,
        MockupCategories $MockupCategories,
        FileExtensions $FileExtensions,
        MockupImages $MockupImages,
        Packages $Packages,
        Presentations $Presentations,
        MockupTypes $MockupTypes
    )
    {
        $this->Request = $Request;
        $this->Mockups = $Mockups;
        $this->FileExtensions = $FileExtensions;
        $this->MockupCategories = $MockupCategories;
        $this->MockupImages = $MockupImages;
        $this->Packages = $Packages;
        $this->Presentations = $Presentations;
        $this->MockupTypes = $MockupTypes;
        $this->middleware('admin');
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
            ],
            "show_delete" => true,
            "show_restore" => false
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
            "FileExtensions" => $this->FileExtensions->all(),
            "MockupTypes" => $this->MockupTypes->all()
        ];
        
        return view('dashboard.pages.mockups.new', $this->Data);
    }
    
    public function presentation($MockupId = null)
    {
        $this->Data['Presentation'] = [
            "Structure" => $this->Presentations->structure(),
            "Images" => $this->Presentations->where('mockup_id', $MockupId)->first(),
            "MockupId" => $MockupId
        ];
        return view('dashboard.pages.mockups.presentation', $this->Data);
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
            'MockupImage' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'MockupPackage' => 'required|mimes:zip,rar,7zip',
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
            $MockupType = $this->Request->input('MockupType');
            $ImageName = time().'.'.$this->Request->MockupImage->extension();
            $PackageName = time().'.'.$this->Request->MockupPackage->extension();
     
            //$this->Request->MockupImage->storeAs('images', $ImageName);
    
            $Data = [
                "name" => $MockupName,
                "keywords" => $MockupKeywords,
                "description" => $MockupDescription,
                "author" => "1",
                "category_id" => $MockupCategory,
                "type_id" => $MockupType,
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
                $this->Mockups->name = $MockupName;
                $this->Mockups->keywords = $MockupKeywords;
                $this->Mockups->description = $MockupDescription;
                $this->Mockups->author  = 1;
                $this->Mockups->category_id = $MockupCategory;
                $this->Mockups->slug = $MockupSlug;
                $this->Mockups->price = $MockupPrice;
                $this->Mockups->info = $MockupInformations;
                $this->Mockups->file_extension = $MockupExtension;
                $this->Mockups->type_id = $MockupType;
                $this->Mockups->size = 1;
                $this->Mockups->dimensions = 1;
                $this->Mockups->license = 1;
                $this->Mockups->save();
                $Id = $this->Mockups->id;
                $Data = [
                    "mockup_id" => $Id,
                ];
                $this->Presentations->insert($Data);
            }
            
            $MockupPathUploadPath = public_path('users/assets/images/products/'.$Id);
            $MockupPathUploadThumb = public_path('users/assets/images/products/'.$Id.'/thumb');
            $MockupPublicPath = '/users/assets/images/products/'.$Id;
            $MockupPublicThumb = '/users/assets/images/products/'.$Id.'/thumb';

            if ($this->Request->hasFile('MockupPackage')) {
                $this->Request->MockupPackage->storeAs('packages', $PackageName);
                $this->Packages->filename = $PackageName;
                $this->Packages->mockup_id = $Id;
                $this->Packages->save();
            }


            if (!file_exists($MockupPathUploadPath)) {
                File::makeDirectory($MockupPathUploadPath);
            }
            if (!file_exists($MockupPathUploadThumb)) {
                File::makeDirectory($MockupPathUploadThumb);
            }

            $this->Request->MockupImage->move($MockupPathUploadPath, $ImageName);

            if($ImageName){
                $this->MockupImages->mockup_id = $Id;
                $this->MockupImages->filename = $ImageName;
                $this->MockupImages->url = $MockupPublicPath;
                $this->MockupImages->preview = 1;
                $this->MockupImages->full_url = $MockupPublicPath.'/'.$ImageName;
                $this->MockupImages->save();
            }

            return redirect()->route('admin.products.mockups.list');
        }
       
    }

    public function save_presentation_img()
    {
        $MockupId = $this->Request->input('mockup_id');
        $Row = $this->Request->input('row');
        $Col = $this->Request->input('col');
        $Hov = $this->Request->input('hov');
        $MockupPathUploadPath = public_path('users/assets/images/products/'.$MockupId);
        $MockupPathUploadThumb = public_path('users/assets/images/products/'.$MockupId.'/thumb');
        $ImageName = time().'.'.$this->Request->Image->extension();

        $this->Request->Image->move($MockupPathUploadPath, $ImageName);

        if($Hov)
            $field = "img_h_".$Row."_".$Col;
        else
            $field = "img_".$Row."_".$Col;
        
        if($this->Presentations->is_exist($MockupId)){
            $Data = [
                $field => $ImageName
            ];
            $this->Presentations->where('mockup_id', $MockupId)->update($Data);
        }else{
            $Data = [
                "mockup_id" => $MockupId,
                $field => $ImageName
            ];
            $this->Presentations->insert($Data);
        }
        return redirect()->route('admin.products.mockups.presentation',$MockupId);
    }

    public function delete($MockupId = null)
    {
        if($MockupId){
            $Mockup = $this->Mockups->where('id',$MockupId)->first();

            if ($Mockup != null) {
                $Mockup->delete();
                redirect()->route('admin.products.mockups.list')->with(['success' => [ 'Successfully deleted!!']]);
            }    
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
            ],
            "show_delete" => false,
            "show_restore" => true
        ];
        $this->Data['Resources'] = [
            "Mockups" => $this->Mockups->by_groups_deleted()
        ];
        return view('dashboard.pages.mockups.trash', $this->Data);
    }

    public function restore($MockupId = null)
    {
        if($MockupId){
            $Showcase = $this->Mockups->withTrashed()->where('id',$MockupId)->first()->restore();

            $messages = [
                "success" => [
                    "Successfully Retored."
                ]
            ];
        }else{

        }
        return redirect()->route('admin.products.mockups.list')->with($messages);
    }
}
