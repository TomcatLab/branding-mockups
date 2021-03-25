<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\Configurations;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use App\Http\Controllers\Controller;


class SettingsController extends Controller
{
    public $Configurations;
    public $Request;

    public function __construct(
        Configurations $Configurations,
        Request $Request
    )
    {
        $this->Configurations = $Configurations;
        $this->Request = $Request;
        $this->middleware('admin');
    }

    //
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
                    ]
                ]
            ]
        ];
        $this->Data['resources'] = [
            "Configurations" => $this->Configurations->by_groups()
        ];
        return view('dashboard.pages.configurations', $this->Data);
    }

    public function save()
    {
        $GroupId = $this->Request->input('group');
        $RequiredConfigurations = $this->Configurations->by_group($GroupId);
        $ValidationRules = [];

        foreach($RequiredConfigurations as $RequiredConfiguration){
            $InputName = Str::slug($RequiredConfiguration->name, '-');
            $InputValues[$RequiredConfiguration->id] = $this->Request->input($InputName);
            if(!empty($RequiredConfiguration->validations))
                $ValidationRules[$InputName] = $RequiredConfiguration->validations;
        }

        $validator = Validator::make($this->Request->all(), $ValidationRules, []);

        if ($validator->fails()) {
           return redirect()->route('admin.settings')
                            ->withErrors($validator)
                            ->withInput($this->Request->input());
        }else{
            $i = 0;
            $messages = [];

            foreach($RequiredConfigurations as $RequiredConfiguration){
                if($RequiredConfiguration->value != $InputValues[$RequiredConfiguration->id]){
                    $this->Configurations->Set(['id' => $RequiredConfiguration->id, 'value' => $InputValues[$RequiredConfiguration->id]]);
                    $i++;
                }
            }

            if($i){
                $messages = [
                    "success" => [
                        "Successfully Updated"
                    ]
                ];    
            }
            
            return redirect()->route('admin.settings')->with($messages);
        }
    }
}
