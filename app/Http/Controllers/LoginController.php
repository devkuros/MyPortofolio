<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\{Auth, Session};
use RealRashid\SweetAlert\Facades\Alert;

class LoginController extends Controller
{
    public function index(){
        return view('auth.login');
    }

    public function login(Request $request){

        $credentials = $request->validate([
            'username' => 'required|string',
            'password' => 'required|string',
        ]);

        if(Auth::attempt($credentials)){
            $request->session()->regenerate();
            Alert::toast('Login Success', 'success')->position('top');
            return redirect()->intended('sys-admin');
        }

        Alert::toast('Please try again', 'error')->position('top');
        return back()->withErrors([
            'username' => 'Username did not exist'
        ]);
    }

    public function logout() {
        Session::flush();
        Auth::logout();

        return Redirect('login');
    }
}
