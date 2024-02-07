<?php

namespace App\Http\Controllers;

use App\Models\Subscribe;
use App\Models\Newsletter;
use App\Mail\NewsLetterMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class SubscribeController extends Controller
{
    public function emailSubscribe(Request $request){
        $sub = Subscribe::where('email', $request->email)->get();
        $count = count($sub);
        if($count >= 1){
            $message = 'exist';
        }else{
            Subscribe::create([
                'email' => $request->email
            ]);
            $message = 'saved';
        }

        return $message;
    }

    public function subscribers(){
        $subscribers = Subscribe::all();
        return view('backend.newsletters.subscribers', compact('subscribers'));
    }

    public function newsletters(){
        $newsletters = Newsletter::all();

        return view('backend.newsletters.newsletters', compact('newsletters'));
    }

    public function details($id){
        $newsletter = Newsletter::find($id);

        return view('backend.newsletters.details', compact('newsletter'));
    }

    public function newsletter_form(){
        return view('backend.newsletters.send_form');
    }

    public function send_newsletter(Request $request){
        $subscribers = Subscribe::all();
        if($subscribers->isEmpty()){
            return redirect('/admin/newsletters')->with('empty', 'Newsletter cannot sent. You have no subscribers');
        }
        $data = [
            'subject' => $request->subject,
            'message' => $request->message
        ];

        Newsletter::create($data);

        
        foreach ($subscribers as $subscribe) {
            Mail::to($subscribe->email)->send(new NewsLetterMail($data));
        }

        return redirect('/admin/newsletters')->with('success', 'Newsletter is sent successfully');
    }

    public function unsubscribe($id){
        $post = Subscribe::find($id);
        if(!$post){
            abort(404);
        }   
        $post->delete();

        return redirect('/admin/subscribers')->with('status', 'Unsubscribe successfully!');
    }

    public function delete_newsletter($id){
        $post = Newsletter::find($id);
        if(!$post){
            abort(404);
        }   
        $post->delete();

        return redirect('/admin/newsletters')->with('status', 'Newsletter deleted successfully!');
    }
}
