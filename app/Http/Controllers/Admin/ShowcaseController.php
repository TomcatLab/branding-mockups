<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\MockupCategories;
use App\Models\Showcases;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\SoftDeletes;


class ShowcaseController extends Controller
{
    use SoftDeletes;
    
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
        $this->middleware('admin');
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
            "show_delete" => true,
            "show_restore" => false
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

           
            $this->Showcases->label = $ShowcaseLabel;
            $this->Showcases->category_id = $ShowcaseCategory;
            $this->Showcases->behance_url = $BehanceProjectUrl;
            $this->Showcases->save();

            $messages = [
                "success" => [
                    "Successfully Saved New Showcase."
                ]
            ];

            return redirect()->route('admin.products.showcases')->with($messages);
        }
    }

    public function delete($ShowcaseId = null)
    {
        if($ShowcaseId){
            $Showcase = $this->Showcases->where('id',$ShowcaseId)->first();
            $Showcase->delete();

            $messages = [
                "success" => [
                    "Successfully Deleted."
                ]
            ];
        }else{

        }

        return redirect()->route('admin.products.showcases')->with($messages);
    }

    public function trash()
    {
        $this->Data['page'] = [
            "header" => [
                "style" => "regular",
                "label" => "Showcases Trash",
                "buttons" => [
                    
                ]
            ],
            "show_delete" => false,
            "show_restore" => true
        ];
        $this->Data['resources'] = [
            "Showcases" => $this->Showcases->onlyTrashed()->get()
        ];
        return view('dashboard.pages.showcaseTrash', $this->Data);
    }

    public function restore($ShowcaseId = null)
    {
        if($ShowcaseId){
            $Showcase = $this->Showcases->withTrashed()->where('id',$ShowcaseId)->first()->restore();

            $messages = [
                "success" => [
                    "Successfully Retored."
                ]
            ];
        }else{

        }
        return redirect()->route('admin.products.showcases')->with($messages);
    }
}
