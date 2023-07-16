<?php

namespace App\Http\Controllers;

use App\Models\Career;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class CareerController extends Controller
{
    public function index(){
        $posts = Career::where('deleted_at', NULL)->get();
        return view('backend.careers.index', compact('posts'));
    }

    public function create_form(){
        return view('backend.careers.create');
    }

    public function create(Request $request){
        $this->validation($request);
        $data = $this->getData($request);

        Career::create($data);

        return redirect('/admin/careers');
    }

    public function update_form($id){
        $post = Career::find($id);
        return view('backend.careers.update', compact('post'));
    }

    public function update(Request $request){
        $this->validation($request);

        $post = Career::find($request->id);

        $post->position = $request->position;
        $post->terms = $request->terms;
        $post->location = $request->location;
        $post->org_background = $request->org_background;
        $post->job_overview = $request->job_overview;
        $post->role = $request->role;
        $post->qualification = $request->qualification;
        $post->benefits = $request->benefits;
        $post->latest_date = $request->latest_date;

        $post->save();

        return redirect ('/admin/careers')->with('status', 'careers is updated successfully!');

    }

    public function destroy($id){
        $post = Career::find($id);
        $post->delete();

        return redirect ('/admin/careers')->with('status', 'careers is deleted successfully!');

    }

    private function validation($request){
        Validator::make($request->all(),[
            'position' => 'required',
            'qualification' => 'required',
        ])->validate();
    }
    private function getData($request){
        return [
            'position' => $request->position,
            'terms' => $request->terms,
            'location' => $request->location,
            'org_background' => $request->org_background,
            'job_overview' => $request->job_overview,
            'role' => $request->role,
            'qualification' => $request->qualification,
            'benefits' => $request->benefits,
            'latest_date' => $request->latest_date,
        ];
    }
}
