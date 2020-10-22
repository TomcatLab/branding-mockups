<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MockupCategories;
use App\Models\Showcases;

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
            "Showcases" => $this->Showcases->all()
        ];
        return view('dashboard.pages.showcase', $this->Data);
    }

    public function add()
    {
        $ValidatedData = $this->Request->validate([
            'ShowcaseLabel' => 'required|max:100',
            "ShowcaseCategory" => 'required|max:100',
            "BehanceProjectUrl" => 'required|max:100',
           // "ShowcaseUser" => 'required|max:100'
        ]);

        # code...
        $ShowcaseLabel = $this->Request->input('ShowcaseLabel');
        $ShowcaseCategory = $this->Request->input('ShowcaseCategory');
        $BehanceProjectUrl = $this->Request->input('BehanceProjectUrl');
        $ShowcaseUser = $this->Request->input('ShowcaseUser');
        
        // if ($Validator->fails()) {
        //     return redirect('admin.products.showcases')
        //                 ->withErrors($Validator)
        //                 ->withInput();
        // }else{
            $Data = [
                "showcase_label" => $ShowcaseLabel,
                "showcase_user" => $ShowcaseUser,
                "showcase_category" => $ShowcaseCategory,
                "showcase_behance_url" => $BehanceProjectUrl
            ];
    
            $this->Showcases->insert($Data);
            return redirect()->route('admin.products.showcases');
        //}
    }

    public function delete()
    {
        
    }
}
