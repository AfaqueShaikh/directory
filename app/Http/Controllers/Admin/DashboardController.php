<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the admin dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function dashboard()
    {
        return view('admin.dashboard');
    }

    /**
     * Log the user out of the application.
     *
     * @return Response
     */
    public function adminLogout()
    {
        auth()->logout();
        /*session()->flash('alert-class', 'alert-success');
        session()->flash('message', 'This user has been logged out');*/
        return redirect()
            ->route('admin.login')
            ->with('This user has been logged out');
    }

}
