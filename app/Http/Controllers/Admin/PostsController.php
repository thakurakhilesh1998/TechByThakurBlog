<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Posts;
use App\Http\Requests\Admin\PostFormRequest;
use Illuminate\Support\Facades\Auth;
class PostsController extends Controller
{
    public function index()
    {
        $posts=Posts::all();
        return view('admin/posts/index',compact('posts'));
    }

    public function create()
    {
        $category=Category::where('status','0')->get();
        return view('admin/posts/create',compact('category'));
    }

    public function store(PostFormRequest $req)
    {
        $data=$req->validated();
        $post=new Posts;
        $post->category_id=$data['category_id'];
        $post->name=$data['name'];
        $post->slug=$data['slug'];
        $post->description=$data['description'];
        $post->yt_iframe=$data['yt_iframe'];
        $post->meta_title=$data['meta_title'];
        $post->meta_description=$data['meta_description'];
        $post->meta_keywords=$data['meta_keywords'];
        $post->status=$req['status']==true?'1':'0';
        $post->created_by=Auth::user()->id;
        $post->save();
        return redirect('admin/posts')->with("message","Post Created Successfullu");
    }
}
