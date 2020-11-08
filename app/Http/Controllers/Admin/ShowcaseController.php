<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\MockupCategories;
use App\Models\Showcases;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;


class ShowcaseController extends Controller
{
    public $Request;
    public $MockupCategories;
    public $Showcases;

    public function __construct(
        Request $Request,
        MockupCategories $MockupCategories,
        Showcases $Showcases
    )
    {
        $this->Request = $Request;
        $this->MockupCategories = $MockupCategories;
        $this->Showcases = $Showcases;
    }

    //
    public function index()
    {
        
        $this->Data['page'] = [
            "header" => [
                "style" => "regular",
                "label" => "Showcases",
                "buttons" => [
                    [
                        "label" => "Add to showcase",
                        "style" => "primary",
                        "action" => "model",
                        "icon" => "file-plus",
                        "target" => "NewShowcaseModal"
                    ]
                ]
            ],
        ];
        $this->Data['resources'] = [
            "MockupCategories" => $this->MockupCategories->all(),
            "Showcases" => $this->Showcases->with_group()
        ];
        return view('dashboard.pages.showcase', $this->Data);
    }

    public function add()
    { 
        $ValidationRules = [
            'ShowcaseLabel' => 'required',
            "ShowcaseCategory" => 'required',
            "BehanceProjectUrl" => 'required',
        ];

        $Validator = Validator::make($this->Request->all(), $ValidationRules, []);
        
        if ($Validator->fails()) {
            return redirect('admin.products.showcases')
                        ->withErrors($Validator)
                        ->withInput();
        }else{
            $ShowcaseLabel = $this->Request->input('ShowcaseLabel');
            $ShowcaseCategory = $this->Request->input('ShowcaseCategory');
            $BehanceProjectUrl = $this->Request->input('BehanceProjectUrl');
            //$ShowcaseUser = $this->Request->input('ShowcaseUser');

            $Data = [
                "label" => $ShowcaseLabel,
                //"user" => $ShowcaseUser,
                "category_id" => $ShowcaseCategory,
                "behance_url" => $BehanceProjectUrl
            ];
    
            $this->Showcases->insert($Data);

            $messages = [
                "success" => [
                    "Successfully Saved New Showcase."
                ]
            ];

            return redirect()->route('admin.products.showcases')->with($messages);
        }
    }

    public function delete()
    {
        $ShowcaseId = $this->Request->input('ShowcaseId');

        if($ShowcaseId){
            $this->Showcases->soft_delete($ShowcaseId);
        }

        $messages = [
            "success" => [
                "Successfully Deleted."
            ]
        ];

        return redirect()->route('admin.products.showcases')->with($messages);
    }

    public function trash()
    {
        $Showcases = $this->Showcases->onlyTrashed()->get();
        return $Showcases;
    }
}
