<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Configurations;

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
            "Configurations" => $this->Configurations->Get()
        ];
        return view('dashboard.pages.configurations', $this->Data);
    }

    public function save()
    {
        $Configurations = $this->Request->all();
        $GroupId = $this->Request->input('group');
        $ValidateInputs = [];

        foreach($Configurations as $Key => $Configuration){
            if(is_numeric($Key)){
                $ValidateInputs[$Key] = "required";
            }
        }

        $validatedData = $this->Request->validate($ValidateInputs);

        if ($validator->fails()) {
           return redirect()->route('admin.settings');
        }else{
            
            foreach($Configurations as $Key => $Configuration){
                if(is_numeric($Key)){
                    $this->Configurations->Set(['configuration_id' => $Key, 'configuration_value' => $Configuration]);
                }
            }

            return redirect()->route('admin.settings');
        }
    }
}
