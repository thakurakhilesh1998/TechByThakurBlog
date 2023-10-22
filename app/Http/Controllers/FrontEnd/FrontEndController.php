<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Posts;

class FrontEndController extends Controller
{
    public function index()
    {
        return view('frontend/index');
    }

    public function viewCategoryPosts(string $category_Slug)
    {
        $category=Category::where('slug',$category_Slug)->where('status','0')->first();
        if($category)
        {
            $posts=Posts::where('category_id',$category->id)->where('status','0')->paginate(5);
            return view('frontend/posts/index',compact('posts','category'));
        }
        else
        {
            return redirect('/');
        }
    }

    public function viewPost(string $category_slug,string $post_slug)
    {
        $category=Category::where('slug',$category_slug)->where('status','0')->first();
        if($category)
        {
            $post=Posts::where('category_id',$category->id)->where('status','0')->first();
            if($post)
            {
                return view('frontend/posts/view',compact('post'));
            }
            else
            {
                return redirect('/');
            }
            
        }
        else
        {
            return redirec('/');
        }
    }
}
