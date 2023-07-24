<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AdminController extends Controller
{
    public function register_form(){
        if (Auth::guard('admins')->check()) {
            return redirect('/admin');
        }
        return view('backend.auth.register');
    }

    public function login_form(){
        if (Auth::guard('admins')->check()) {
            return redirect('/admin');
        }

        return view('backend.auth.login');
    }

    public function register(Request $request){

        $this->validation($request);
        $data = $this->getData($request);
        $admin = Admin::create($data);

        $credentials = $request->only('email', 'password');

        Auth::guard('admins')->login($admin);

        return redirect('/admin');
    }

    public function login(Request $request){


        $credentials = $request->only('email', 'password');

        if (Auth::guard('admins')->attempt($credentials)) {
            // Authentication passed...
            return redirect()->intended(route('admin'));
        }

        return back();

    }

    public function logout(){
        Auth::guard('admins')->logout();

        return redirect()->route('admin.login_form');
    }

    private function validation($request)
    {
        Validator::make($request->all(),[
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'role' => 'required',
            'password' => 'required|min:4|confirmed',
        ])->validate();
    }

    private function getData($request)
    {
        return [
            'name' => $request->name,
            'email' => $request->email,
            'role' => $request->role,
            'password' => Hash::make($request->password),
        ];
    }
}
