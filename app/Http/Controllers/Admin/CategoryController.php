<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\Admin\CategoryFormRequest;

class CategoryController extends Controller
{
    public function index()
    {
        return view('admin/category/index');
    }

    public function create()
    {
        return view('admin/category/create');
    }

    public function store(CategoryFormRequest $req)
    {
        $data=$req->validated();

        $category=new Category;
        $category->name=$data['name'];
        $category->slug=$data['slug'];
        $category->description=$data['description'];
        if($req->hasFile('image'))
        {
            $file=$req->file('image');
            $filename=time().'.'.$file->getClientOriginalExtension();
            $file->move('uploads/category/',$filename);
            $category->image=$filename;
        }
        $category->meta_title=$data['meta_title'];
        $category->meta_description=$data['meta_description'];
        $category->meta_keyboard=$data['meta_keyboard'];
        $category->navbar_status=$req['navbar_status']==true?'1':'0';
        $category->status=$req['status']==true?'1':'0';
        $category->created_by=Auth::user()->id;
        $category->save();
        return redirect('admin/category')->with('message',"Category Added Successfully");
    }
}
