<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\Emails;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;

class EmailsController extends Controller
{
    public $Emails;
    public $Request;


    public function __construct(
        Emails $Emails,
        Request $Request
    )
    {
        $this->Emails = $Emails;
        $this->Request = $Request;
        $this->middleware('admin');
    }
    //
    public function index()
    {
        $this->Data['resource'] = [
            "Emails" => $this->Emails->all()
        ];
        return view('dashboard.pages.emails', $this->Data);
    }

    public function Save()
    {
        $ValidatedRules = array(
            'EmailContent' => 'required',                       // just a normal required validation
            'EmailSubject' => 'required',    // required and must be unique in the ducks table
        );

        $messages = array(
            'required' => 'The :attribute is really really really important.',
            'same'  => 'The :others must match.'
        );

        $validator = Validator::make($this->Request->all(), $ValidatedRules, $messages);

        if ($validator->fails()) {
            return redirect()->route('admin.emails')
                                ->withErrors($validator)
                                ->withInput($this->Request->input());
        }
        else{
            $EmailId = $this->Request->input('EmailId');
            $EmailSubject = $this->Request->input('EmailSubject');
            $EmailContent = $this->Request->input('EmailContent');
    
            $Data = [
                "subject" => $EmailSubject,
                "content" => $EmailContent
            ];
            $this->Emails->Set($EmailId, $Data);
    
            $messages = [
                "success" => [
                    "Successfully Updated"
                ]
            ];
            return redirect()->route('admin.emails')->with($messages);
        }
    }
}
