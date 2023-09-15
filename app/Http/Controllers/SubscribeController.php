<?php

namespace App\Http\Controllers;

use App\Models\Subscribe;
use Illuminate\Http\Request;

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
}
