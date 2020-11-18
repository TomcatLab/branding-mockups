<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\ResetsPasswords;

class ResetPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset requests
    | and uses a simple trait to include this behavior. You're free to
    | explore this trait and override any methods you wish to tweak.
    |
    */

    use ResetsPasswords;

    /**
     * Where to redirect users after resetting their password.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    public function showResetForm()
    {
        $this->Data["menu"] = [
            [
                "type" => "page",
                "label" => "Mockups",
                "link" => ""
            ],
            [
                "type" => "page",
                "label" => "Freebies",
                "link" => ""
            ],
            [
                "type" => "page",
                "label" => "Showcase",
                "link" => ""
            ],
        ];

        return view('auth.passwords.reset', $this->Data);
    }
}
