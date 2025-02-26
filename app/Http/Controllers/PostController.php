<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index(){
        return view('CreatePost');
    }

    public function store(Request $request){
        $request->validate([
            'post_title' => 'required|max:255',
            'post_photo' => 'image|required|max:10240|nullable',
        ]);


        $imagepath = $request->hasFile('post_photo') ? $request->file('post_photo')->storeAs('uploads' , $request->file('post_photo')->getClientOriginalName() , 'public') : null;

        $post = Post::create([
            'post_title' => $request->post_title,
            'post_photo' => $imagepath,
        ]);

        return redirect(route('dashboard'))->with('success', 'Post created successfully!');
    }
}
