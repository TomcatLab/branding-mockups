<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Auth;
use App\Models\Pages;
use App\Models\Configurations;


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
    protected $redirectTo = '/user/account';

    /**
     * Create a new controller instance.
     *
     * @return void
     */

    public $Pages;
    public $Request;
    public $Configurations;

    public function __construct(
        Pages $Pages,
        Request $Request,
        Configurations $Configurations
    )
    {
        $this->Pages = $Pages;
        $this->Request = $Request;
        $this->Configurations = $Configurations;
    }

    public function showLoginForm()
    {
        $this->Data["menus"] = $this->Pages->get_menus();
        $this->Data['PageConfig'] = [
            "config" => $this->Configurations->get_configurations(3),
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
            $request->session()->put('is_admin', true);
            return redirect()->intended(route('admin.analytics'));
        }
        
        return back()->withInput($request->only('email', 'remember'));
        
    }
}
