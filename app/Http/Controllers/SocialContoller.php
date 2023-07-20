<?php

namespace App\Http\Controllers;

use App\Models\Social;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class SocialContoller extends Controller
{
    public function index(){
        $posts = Social::where('deleted_at', NULL)->get();
        
        if(count($posts) >= 1){
            foreach ($posts as $post) {
                $post = $post;
            }
        }else{
            $post = [];
        }

        return view('backend.socials.index', compact('post'));
    }

    public function create(Request $request){
        $this->validation($request);
    
        $posts = Social::where('deleted_at', NULL)->get();

        $count = count($posts);

        if($count >= 1){
            $post = Social::find($request->id);
            $post->site_title = $request->site_title;
            $post->email = $request->email;
            $post->contact = $request->phone;
            $post->address = $request->address;
            $post->facebook = $request->facebook;
            $post->youtube = $request->youtube;
            $post->instagram = $request->instagram;
            $post->twitter = $request->twitter;
            $post->linked_in = $request->linked_in;
            $post->whatsapp = $request->whatsapp;
            $post->line = $request->line;
            $post->footer_text = $request->footer_text;
            
            $post->save();

        }else{
            $data = $this->getData($request);
            Social::create($data);
        }

        return redirect()->back();
        
    }

    private function validation($request){
        Validator::make($request->all(),[
            'site_title' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'address' => 'required',
        ])->validate();
    }
    private function getData($request){
        return [
            'site_title' => $request->site_title,
            'email' => $request->email,
            'contact' => $request->phone,
            'address' => $request->address,
            'facebook' => $request->facebook,
            'youtube' => $request->youtube,
            'instagram' => $request->instagram,
            'twitter' => $request->twitter,
            'linked_in' => $request->linked_in,
            'whatsapp' => $request->whatsapp,
            'line' => $request->line,
            'footer_text' => $request->footer_text,
        ];
    }
}
