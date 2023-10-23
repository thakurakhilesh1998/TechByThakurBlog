<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use App\Http\Requests\Admin\CategoryFormRequest;

class CategoryController extends Controller
{
    public function index()
    {
        $category=Category::all();
        return view('admin/category/index',compact('category'));
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
        $category->slug=Str::slug($data['slug']);
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

    public function edit($category_id)
    {
        $category=Category::find($category_id);
        return view('admin.category.edit',compact('category'));
    }

    public function update(CategoryFormRequest $req,$category_id)
    {
        $data=$req->validated();

        $category=Category::find($category_id);
        $category->name=$data['name'];
        $category->slug=Str::slug($data['slug']);
        $category->description=$data['description'];
        if($req->hasFile('image'))
        {
            $destination='uploads/category/'.$category->image;
            if(File::exists($destination))
            {
                File::delete($destination);
            }
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
        $category->update();
        return redirect('admin/category')->with('message',"Category Updated Successfully");
    }

    public function destroy(Request $request)
    {
        $category=Category::find($request->category_id);
        if($category)
        {
            $destination='uploads/category/'.$category->image;
            if(File::exists($destination))
            {
                File::delete($destination);
            }
            $category->posts()->delete();
            $category->delete();
            return redirect('admin/category')->with('message',"Category Deleted with its posts Successfully");
        }
    }
}
