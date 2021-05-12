<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class PostController extends Controller
{

    public function index()
    {
        $posts = Post::all();
        return view('admin.posts.index', ['posts' => $posts]);    
    }


    public function show(Post $post)
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
            $inputs['post_image'] = 'storage/' . $request->post_image->store('images');
        }

        auth()->user()->posts()->create($inputs);

        session()->flash('post-create-message', 'Post with title "'. $inputs['title'] .'" Created Successfuly');

        return redirect()->route('post.index');

    }

    public function edit(Post $post)
    {
        return view('admin.posts.edit', ['post' => $post]);
    }

    public function update(Post $post, Request $request)
    {
        $inputs = $request->validate([
            'title' => ['required', 'min:8', 'max:255'],
            'post_image' => ['file' ,'mimes:jpeg,png'],
            'body' => ['required', 'min:8']
        ]);

        if ($request->has('post_image')) {
            $inputs['post_image'] = 'storage/' . $request->post_image->store('images');
            $post->post_image = $inputs['post_image'];
        }
        $post->title = $inputs['title'];
        $post->body = $inputs['body'];

        // auth()->user()->posts()->save($post);
        $post->save();

        session()->flash('post-update-message', 'Post with title "'. $inputs['title'] .'" Updated Successfuly');

        return redirect()->route('post.index');
        
    }


    public function destroy(Post $post, Request $request)
    {
        $post->delete();

        // Session::flash('message', 'Post Was Deleted');
        $request->session()->flash('message', 'Post Was Deleted');

        return back();
    }
}
