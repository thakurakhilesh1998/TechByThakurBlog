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

    public function viewCategoryPosts($category_Slug)
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
}
