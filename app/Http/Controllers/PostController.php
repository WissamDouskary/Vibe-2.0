<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function index(){
        return view('CreatePost');
    }

    public function show(){
        $user = Auth::user();
        $posts = Post::where('user_id', $user->id)->latest()->get();

        return view('post-update-delete', compact('user', 'posts'));
    }

    public function store(Request $request){
        $request->validate([
            'post_title' => 'required|max:255',
            'post_photo' => 'image|max:10240|nullable',
        ]);

        $imagepath = $request->hasFile('post_photo') ? $request->file('post_photo')->storeAs('uploads' , $request->file('post_photo')->getClientOriginalName() , 'public') : null;

        $post = Post::create([
            'post_title' => $request->post_title,
            'user_id' => Auth::id(),
            'post_photo' => $imagepath,
        ]);

        return redirect(route('dashboard'))->with('success', 'Post created successfully!');
    }

    public function edit($id)
    {
        $post = Post::findOrFail($id);
        return view('posts-edit', compact('post'));
    }

    public function update(Request $request, $id)
    {
        $post = Post::findOrFail($id);
        $request->validate([
            'post_title' => 'required|string|max:255',
            'post_photo' => 'nullable|image|max:10240',
        ]);

        if ($request->hasFile('post_photo')) {
            $imagePath = $request->file('post_photo')->store('posts', 'public');
            $post->post_photo = $imagePath;
        }

        $post->post_title = $request->post_title;
        $post->post_title = $request->post_title;
        $post->save();

        return redirect()->route('posts.index')->with('success', 'Post updated successfully!');
    }

    public function getposts(){
        $friends = auth()->user()->friends()->pluck('id');

        $posts = Post::whereIn('user_id', $friends)
        ->with('user')
        ->latest('created_at')
        ->get();

        return view('dashboard', compact('posts'));
    }

    public function getUserPosts($user_id){
        $posts = Post::where('user_id', $user_id)
                ->with('user')
                ->latest('created_at')
                ->get();
        return view('user', compact('posts'));
    }
}
