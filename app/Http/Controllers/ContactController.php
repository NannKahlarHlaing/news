<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Mail\ContactMail;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class ContactController extends Controller
{
    public function sendEmail(Request $request){
        $this->validation($request);

        $data = $this->getData($request);

        Contact::create($data);

        Mail::to('imh.nannkahlar@gmail.com')->send(new ContactMail($data));

        return back()->with('message', 'Your Message has been send successfully!');

    }

    private function validation($request){
        Validator::make($request->all(),[
            'name' => 'required',
            'email' => 'required',
        ])->validate();
    }

    private function getData($request){
        return [
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'organisation' => $request->organisation,
            'category' => $request->category,
            'message' => $request->message
        ];
    }
}
