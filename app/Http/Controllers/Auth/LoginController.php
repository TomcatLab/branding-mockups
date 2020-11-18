<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Auth;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function showLoginForm()
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

        return view('auth.login', $this->Data);
    }

    public function admin_login_form()
    {
        $Data = [
            "FullPage" => true
        ];
        return view('dashboard.auth.login', $Data);
    }

    public function admin_login(Request $request)
    {
        $this->validate($request, [
            'email'   => 'required|email',
            'password' => 'required|min:6'
        ]);

        if (Auth::guard('admin')->attempt([
                    'email' => $request->email,
                    'password' => $request->password
                ],
                $request->get('remember')
                )
            ){
            return redirect()->intended(route('admin.analytics'));
        }
        
        return back()->withInput($request->only('email', 'remember'));
        
    }
}
