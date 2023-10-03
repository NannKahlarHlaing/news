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

    public function newsletter(){
        return view('backend.newsletters.send_form');
    }

    public function send_newsletter(Request $request){
        $data = [
            'subject' => $request->subject,
            'message' => $request->message
        ];

        Newsletter::create($data);

        $subscribers = Subscribe::all();
        foreach ($subscribers as $subscribe) {
            Mail::to($subscribe->email)->send(new NewsLetterMail($data));
        }

        return redirect()->back()->with('success', 'Newsletter is sent successfully');

    }
}
