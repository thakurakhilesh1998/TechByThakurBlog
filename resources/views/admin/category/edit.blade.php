@extends('layouts.master')

@section('title','Edit Category')

@section('main')
<div class="container-fluid px-4">


    <h1 class="mt-4">Edit Category</h1>
    <ol class="breadcrumb mb-4">
        
    </ol>
    <div class="card mt-4">
        @if($errors->any())
        <div class="alert alert-danger">
            @foreach ($errors->all() as $error)
                <div>{{$error}}</div>
            @endforeach
        </div>
        @endif
        <div class="card-body">
            <form action="{{url('admin/update-category/'.$category->id)}}" method="POST" enctype="multipart/form-data">
                @csrf
                @method("PUT")
                <div class="mb-3">
                    <label for="">Category Name</label>
                    <input type="text" class="form-control" name="name" value="{{$category->name}}">
                </div>
                <div class="mb-3">
                    <label for="">Slug Name</label>
                    <input type="text" class="form-control" name="slug" value="{{$category->slug}}">
                </div>
                <div class="mb-3">
                    <label for="">Description</label>
                    <textarea name="description"  rows="5" class="form-control">{{$category->description}}</textarea>
                </div>
                <div class="mb-3">
                    <label for="">Image</label>
                   <input type="file" class="form-control" name="image">
                </div>
                <h6>SEO Tag</h6>
                <div class="mb-3">
                    <label for="">Meta Title</label>
                   <input type="text" class="form-control" name="meta_title" value="{{$category->meta_title}}">
                </div>
                <div class="mb-3">
                    <label for="">Meta Description</label>
                   <textarea name="meta_description" class="form-control">{{$category->meta_description}}</textarea>
                </div>
                <div class="mb-3">
                    <label for="">Meta Keyboard</label>
                   <textarea name="meta_keyboard" class="form-control">{{$category->meta_keyboard}}</textarea>
                </div>
                <h6>Status Mode</h6>
                <div class="row">
                <div class="mb-3 col-md-3">
                    <label for="">Navbar Status</label>
                   <input type="checkbox" name="navbar_status" {{$category->navbar_status=='1'?"checked":""}}>
                </div>
                <div class="mb-3 col-md-3">
                    <label for="">Status</label>
                   <input type="checkbox" name="status" {{$category->status=='1'?"checked":""}}>
                </div>
                <div class="col-md-6">
                    <button type="submit"  class="btn btn-primary">Update Category</button>
                </div>
                 </div>
            </form>
        </div>
    </div>

</div>
@endsection