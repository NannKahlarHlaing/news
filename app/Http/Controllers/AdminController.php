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

        Validator::make($request->all(),[
            'email' => 'required',
            'password' => 'required|min:4',
            ])->validate();

        $credentials = $request->only('email', 'password');

        if (Auth::guard('admins')->attempt($credentials)) {
            // Authentication passed...
            return redirect()->intended(route('admin'));
        }

        return back()->with('login_error', 'Your Credentials doesn\'t match');

    }

    public function logout(){
        Auth::guard('admins')->logout();

        return redirect()->route('admin.login_form');
    }

    public function index(){
        $posts = Admin::all();
        return view('backend.users.index', compact('posts'));
    }

    public function create_form(){
        return view('backend.users.create');
    }

    public function create(Request $request){

        $this->validation($request);
        $data = $this->getData($request);
        $admin = Admin::create($data);

        return redirect('/admin/users');
    }

    public function update_form($id){
        $post = Admin::find($id);
        if(!$post){
            abort(404);
        }

        return view('backend.users.update', compact('post'));
    }

    public function update(Request $request){
        $user = Admin::find($request->id);
        if(!$user){
            abort(404);
        }
        Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email',
            'role' => 'required',
        ])->validate();

        if ($request->check == 'on') {
            Validator::make($request->all(), [
                'password' => 'required|min:4|confirmed',
            ])->validate();
            $user->password = Hash::make($request->password);
        }

        $user->name = $request->name;
        $user->email = $request->email;
        $user->role = $request->role;

        $user->save();

        return redirect('/admin/users');
    }

    public function destroy($id){
        $post = Admin::find($id);
        if(!$post){
            abort(404);
        }
        $post->delete();

        return redirect ('/admin/users')->with('status', 'User is deleted successfully!');

    }

    public function forgot_password(){
        return view('auth.passwords.email');
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
