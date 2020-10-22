<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mockups;
use App\Models\FileExtensions;
use App\Models\MockupCategories;


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
                    ]
                ]
            ]
        ];
        $this->Data['resources'] = [
            "Mockups" => $this->Mockups->all()
        ];
        return view('dashboard.pages.mockups.all', $this->Data);
    }

    public function new()
    {
        $this->data['Resources'] = [
            "MockupCategories" => $this->MockupCategories->all(),
            "FileExtensions" => $this->FileExtensions->all()
        ];
        
        return view('dashboard.pages.mockups.new', $this->data);
    }

    public function save()
    {
        $ValidatedData = $this->Request->validate([
            'MockupName' => 'required|max:100',
            //'MockupKeywords' => "",
            //'MockupDescription' => "",
            "MockupCategory" => "required",
            "MockupSlug" => "required",
            "MockupPrice" => "required",
            //"MockupInformations" => "",
            //"MockupExtension" => ""
        ]);
  
        $MockupName = $this->Request->input('MockupName');
        $MockupKeywords = $this->Request->input('MockupKeywords');
        $MockupDescription = $this->Request->input('MockupDescription');
        $MockupCategory = $this->Request->input('MockupCategory');
        $MockupSlug = $this->Request->input('MockupSlug');
        $MockupPrice = $this->Request->input('MockupPrice');
        $MockupInformations = $this->Request->input('MockupInformations');
        $MockupExtension = $this->Request->input('MockupExtension');
    
        // if ($Validator->fails()) {
        //     return redirect('admin.products.mockups.new')
        //                 ->withErrors($Validator)
        //                 ->withInput();
        // }else{
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
                "created_at" => date('Y-m-d H:i:s'),
                "status" => 1
            ];
    
            $this->Mockups->insert($Data);
            return redirect()->route('admin.products.mockups.list');
        //}
       
    }

    public function delete()
    {
        $ValidatedData = $this->Request->validate([
            'MockupId' => 'required',
        ]);
        // if ($Validator->fails()) {
        //     return redirect('admin.products.mockups.list')
        //                 ->withErrors($Validator)
        //                 ->withInput();
        // }else{
            $MockupId = $this->Request->input('MockupId');
            $Mockup = $this->Mockups->find($MockupId);
            $Mockup->delete();
            return redirect()->route('admin.products.mockups.list');
        //}
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
