<?php
namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    protected $redirectTo = '/admin/dashboard';

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
        $this->middleware('auth')->only('logout');
    }

    protected function loggedOut(Request $request)
    {
        return redirect('/');
    }

    // Override showLoginForm untuk custom view
    public function showLoginForm()
    {
        return view('auth.login');
    }

    // Override credentials untuk memastikan hanya email & password
    protected function credentials(Request $request)
    {
        return $request->only($this->username(), 'password');
    }
}