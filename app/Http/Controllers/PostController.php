<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{

    public function index(Post $post)
    {
        return view('blog-post', ['post' => $post]);
    }

    public function create()
    {
        return view('admin.posts.create');
    }

    public function store(Request $request)
    {


        $inputs = $request->validate([
            'title' => ['required', 'min:8', 'max:255'],
            'post_image' => ['file' ,'mimes:jpeg,png'],
            'body' => ['required', 'min:8']
        ]);

        
        if ($request->has('post_image')) {
            $inputs['post_image'] = $request->post_image->store('images');
        }


        
        auth()->user()->posts()->create($inputs);

        return back();

    }
}
