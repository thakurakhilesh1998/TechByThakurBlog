<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Posts;
use App\Http\Requests\Admin\PostFormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
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
        $post->slug=Str::slug($data['slug']);
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

    public function edit($post_id)
    {
        $category=Category::where('status','0')->get();
        $post=Posts::find($post_id);
        return view('admin/posts/edit',compact('post','category'));
    }

    public function update(PostFormRequest $req,$post_id)
    {
        $data=$req->validated();
        $post=Posts::find($post_id);
        $post->category_id=$data['category_id'];
        $post->name=$data['name'];
        $post->slug=Str::slug($data['slug']);
        $post->description=$data['description'];
        $post->yt_iframe=$data['yt_iframe'];
        $post->meta_title=$data['meta_title'];
        $post->meta_description=$data['meta_description'];
        $post->meta_keywords=$data['meta_keywords'];
        $post->status=$req['status']==true?'1':'0';
        $post->created_by=Auth::user()->id;
        $post->update();
        return redirect('admin/posts')->with("message","Post Updated Successfullu");
    }

    public function destroy($post_id)
    {
        $post=Posts::find($post_id);
        if($post)
        {
            $post->delete();
            return redirect('admin/posts')->with("message","Post Deleted Successfullu");
        }
    }
}
