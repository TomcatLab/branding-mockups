<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Emails;

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
        $EmailId = $this->Request->input('EmailId');
        $EmailSubject = $this->Request->input('EmailSubject');
        $EmailContent = $this->Request->input('EmailContent');

        $Data = [
            "email_subject" => $EmailSubject,
            "email_content" => $EmailContent
        ];
        $this->Emails->Set($EmailId, $Data);

        return redirect()->route('admin.emails');
    }
}
