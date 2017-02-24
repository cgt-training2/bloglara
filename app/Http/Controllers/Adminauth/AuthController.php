<?php

namespace App\Http\Controllers\Adminauth;

use App\User;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use Auth;
use Session;

class AuthController extends Controller {
    
    use AuthenticatesAndRegistersUsers, ThrottlesLogins;

    protected $redirectTo = '/dashboard';
    protected $guard='admin';

    public function showLoginForm(){

        if(Auth::guard('admin')->check()) {

            return redirect('/dashboard');

        }

        return view('admin.login');

    }
    
    public function logout(){

        Auth::guard('admin')->logout();
        Session::flush();
        return redirect('/admin');

    }
}