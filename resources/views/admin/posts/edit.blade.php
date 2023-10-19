@extends('layouts.master')

@section('title','Edit Post')

@section('main')
<div class="container-fluid px-4 mt-4">
    <div class="card">
        <div class="card-header">
            <h4>Edit Posts
                <a href="{{url('admin/posts')}}" class="btn btn-success float-end">Back</a>
            </h4>
        </div>
        @if($errors->any())
        <div class="alert alert-danger">
            @foreach ($errors->all() as $error)
                <div>{{$error}}</div>
            @endforeach
        </div>
        @endif
        <div class="card-body">
            <form method="POST" action="{{url('admin/update-post/'.$post->id)}}">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label>Category Name</label>
                    <select name="category_id" id="" class="form-control">
                        <option value="">--Select Category--</option>
                        @foreach ($category as $cat)
                                <option value="{{$cat->id}}" {{$cat->id==$post->category_id?"selected":''}}>{{$cat->name}}</option>    
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" name="name" value="{{$post->name}}"/>
                </div>
                <div class="mb-3">
                    <label for="slug">Slug</label>
                    <input type="text" class="form-control" name="slug" value="{{$post->slug}}"/>
                </div>
                <div class="mb-3">
                    <label for="description">Description</label>
                    <textarea name="description" id="des_summernote" class="form-control">{{$post->description}}</textarea>
                </div>
                <div class="mb-3">
                    <label for="yt_iframe">Youtube Link</label>
                    <input type="text" class="form-control" name="yt_iframe" value="{{$post->yt_iframe}}"/>
                </div>
                <h4>SEO</h4>
                <div class="mb-3">
                    <label for="meta_title">Meta Title</label>
                    <input type="text" class="form-control" name="meta_title" value="{{$post->meta_title}}"/>
                </div>
                <div class="mb-3">
                    <label for="meta_title">Meta Description</label>
                    <textarea class="form-control" name="meta_description">{{$post->meta_description}}</textarea>
                </div>
                <div class="mb-3">
                    <label for="meta_keyword">Meta Keywords</label>
                    <textarea class="form-control" name="meta_keywords">{{$post->meta_keywords}}</textarea>
                </div>
                <h4>Status</h4>
                <div class="row">
                    <div class="col-md-4 mb-3">
                            <label for="Status">Status</label>
                            <input type="checkbox" name="status" {{$post->status=='1'?'checked':''}}/>
                    </div>
                    <div class="col-md-8">
                        <div class="mb-3">
                            <button type="submit" class="btn btn-primary float-end">Update Posts</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection