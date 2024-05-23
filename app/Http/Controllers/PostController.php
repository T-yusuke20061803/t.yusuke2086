<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\PostRequest;
use App\Models\Post;

class PostController extends Controller
{
    public function index(Post $post)
    {
        return view('posts.index')->with(['post' =>getPaginateByLimit(5)]);
    }
    public function show(Post $post)
    {
        return view('posts.show')->with(['post'=>$post]);
    }
    public function create()
    {
        return view('posts.create')->with(['post'=>$post]);
    }
    public function store(PostRecuest $request, Post $post)
    {
        $input = $request['post'];
        $post->fill($input)->save();
        return redirect('/posts/' . $post->id);
    }
    public function edit(Post $post)
    {
        return view('posts.edit')->with(['post'=>$post]);
    }
    public function update(PostRequest $request,t Post $post)
    {
        $input_post = $request['post'];
        $post->fill($input_post)->save();
        return redirect('/posts/' . $post->id);
    }
    public function delete(Post $post)
    {
        $post -> delete();
        return redirect('/');
    }
}
