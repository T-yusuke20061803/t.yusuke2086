<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use App\Models\Category;

class PostController extends Controller
{
    public function index(Post $post)
    {
        return view('posts.index')->with(['posts' => $post->getPaginateByLimit(1)]);  
       //blade内で使う変数'posts'と設定。'posts'の中身にgetを使い、インスタンス化した$postを代入。
    }
    public function show(Post $post)
    {
       return view('posts.show')->with(['posts' => $post]);
    }
    public function create(Category $category)
    {
        return view('posts.create')->with([$category=> $category->get()]);
    }
}
?>