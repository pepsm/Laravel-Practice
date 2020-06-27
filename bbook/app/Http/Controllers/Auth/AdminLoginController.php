<?php

namespace bbook\Http\Controllers\Auth;

use bbook\Http\Controllers\Controller;
use bbook\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Auth;

class AdminLoginController extends Controller
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
    protected $redirectTo = RouteServiceProvider::DASHBOARD;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest:admin')->except('logout');
    }

    public function showLoginForm()
    {
        return view('auth.admin-login');
    }

    public function login(Request $request)
    {
        // Validate the form data
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required|min:6'   
        ]);

        // Attempt to log the user in~
        if(Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password], $request->remember))
        {
            // if successful, then redirect to the intended location
            // return redirect()->intended(route('admin.dashboard'));
            return redirect(route('admin.dashboard'));            
        }

        // if unsuccessful, then redirect back to login with the form data~
        return redirect()->route('admin.login')->withInput($request->only('email', 'remember'))->with('error', 'Unauthorized account.');
    }
}
