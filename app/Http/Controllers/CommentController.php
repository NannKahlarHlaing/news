<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CommentController extends Controller
{
    public function create(Request $request){
        $type = $request->user_type;

        if($type == 'anonymous'){
            $validator = Validator::make($request->all(),[
                'post_id' => 'required',
                'comment' => 'required'
            ]);
            if ($validator->fails()) {
                return response()->json(['errors' => $validator->errors()]);
            }
        }else{
            $validator = Validator::make($request->all(),[
                'post_id' => 'required',
                'user_name' => 'required',
                'user_email' => 'required',
                'comment' => 'required'
            ]);
            if ($validator->fails()) {
                return response()->json(['errors' => $validator->errors()]);
            }
        }

        Comment::create([
            'post_id' => $request->post_id,
            'user_type' => $request->user_type,
            'name' => $request->user_name,
            'email' => $request->user_email,
            'comment' => $request->comment
        ]);

        return response()->json(['success' => 'success']);
    }
}
