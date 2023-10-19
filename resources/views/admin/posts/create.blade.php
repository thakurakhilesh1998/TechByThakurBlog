@extends('layouts.master')

@section('title','Create Dashboard')

@section('main')
<div class="container-fluid px-4 mt-4">
    <div class="card">
        <div class="card-header">
            <h4>Create Posts</h4>
        </div>
        @if($errors->any())
        <div class="alert alert-danger">
            @foreach ($errors->all() as $error)
                <div>{{$error}}</div>
            @endforeach
        </div>
        @endif
        <div class="card-body">
            <form method="POST" action="{{url('admin/add-posts')}}">
                @csrf
                <div class="mb-3">
                    <label>Category Name</label>
                    <select name="category_id" id="" class="form-control">
                        @foreach ($category as $cat)
                                <option value="{{$cat->id}}">{{$cat->name}}</option>    
                        @endforeach
                        
                    </select>
                </div>
                <div class="mb-3">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" name="name"/>
                </div>
                <div class="mb-3">
                    <label for="slug">Slug</label>
                    <input type="text" class="form-control" name="slug"/>
                </div>
                <div class="mb-3">
                    <label for="description">Description</label>
                    <textarea name="description" id="des_summernote" class="form-control"></textarea>
                </div>
                <div class="mb-3">
                    <label for="yt_iframe">Youtube Link</label>
                    <input type="text" class="form-control" name="yt_iframe"/>
                </div>
                <h4>SEO</h4>
                <div class="mb-3">
                    <label for="meta_title">Meta Title</label>
                    <input type="text" class="form-control" name="meta_title"/>
                </div>
                <div class="mb-3">
                    <label for="meta_title">Meta Description</label>
                    <textarea class="form-control" name="meta_description"></textarea>
                </div>
                <div class="mb-3">
                    <label for="meta_keyword">Meta Keywords</label>
                    <textarea class="form-control" name="meta_keywords"></textarea>
                </div>
                <h4>Status</h4>
                <div class="row">
                    <div class="col-md-4 mb-3">
                            <label for="Status">Status</label>
                            <input type="checkbox" name="status"/>
                    </div>
                    <div class="col-md-8">
                        <div class="mb-3">
                            <button type="submit" class="btn btn-primary float-end">Save Posts</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection