<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CommentController extends Controller
{
    public function create(Request $request){

        $formData = $request->formData;
        parse_str($formData, $formDataArray);

        $type = $formDataArray['user_type'];

        Comment::create([
            'post_id' => $formDataArray['post_id'],
            'user_type' => $formDataArray['user_type'],
            'name' => $formDataArray['user_name'],
            'email' => $formDataArray['user_email'],
            'comment' => $formDataArray['comment']
        ]);

        return response()->json(['success' => 'success']);
    }
}
