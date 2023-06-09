<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

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
    protected $redirectTo = '/dashboard';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function index()
    {
        return view('auth.login');
    }

    public function submitLogin(LoginRequest $request)
    {
        $credentials = $request->getCredentials();

        if(!auth()->validate($credentials)):
            return redirect()->to('login')
                ->with('error', trans('auth.failed'));
        endif;

        $user = auth()->getProvider()->retrieveByCredentials($credentials);

        auth()->login($user);

        return $this->authenticated($request, $user);
    }

    /**
     * Handle response after user authenticated
     *
     * @param Request $request
     * @param Auth $user
     *
     * @return \Illuminate\Http\Response
     */
    protected function authenticated(Request $request, $user)
    {
        if ($user->is_admin == 1) {
            return redirect()
                ->route('admin.dashboard')
                ->with('message', "You are logged in successfully.");
        }
        return redirect()
            ->intended('/dashboard')
            ->with('message', "You are logged in successfully.");
    }

    /**
     * Log out account user.
     *
     * @return \Illuminate\Routing\Redirector
     */
    public function logout()
    {
        request()->session()->flush();

        auth()->logout();

        return redirect('login')
            ->with('message', "You are logged out successfully.");
    }

}
