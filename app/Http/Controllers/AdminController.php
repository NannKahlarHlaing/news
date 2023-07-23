<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AdminController extends Controller
{
    public function register_form(){
        return view('backend.auth.register');
    }

    public function login_form(){
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
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::guard('admins')->attempt($credentials)) {
            // Authentication passed...
            return redirect('/admin');
        }

        return redirect()->back()->withInput()->withErrors([
            'email' => 'Invalid email or password',
        ]);

        
   
        // $credentials = $request->only('email', 'password');

        // if (Auth::attempt($credentials, $request->filled('remember'))) {
        //     return redirect('/');
        // }
  
        // return redirect()->back()->withInput($request->only('email', 'remember'))->withErrors([
        //     'email' => 'These credentials do not match our records.',
        // ]);
    }

    public function logout(){
        Auth::logout();
        return redirect('/login');
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
