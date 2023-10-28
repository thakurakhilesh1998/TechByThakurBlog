@extends('layouts.master')

@section('title','Settings')

@section('main')
<div class="container-fluid px-4 mt-4">
    <div class="card">
        <div class="card-header">
            <h4>Settings</h4>
        </div>
        <div class="card-body">
            @if(session('message'))
            <div class="alert alert-success">{{session('message')}}</div>
            @endif

            <form action="{{url('admin/settings')}}" method="POST"  enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="WebStie Name">Website Name</label>
                <input type="text" name="website_name" class="form-control" required @if($setting) value ="{{$setting->website_name}}" @endif>
            </div>

            <div class="mb-3">
                <label for="WebStie Name">Website Logo</label>
                <input type="file" name="logo" class="form-control" accept="image/jpeg,image/png,image/gif">
                @if($setting)
                <img src="{{asset('uploads/settings/'.$setting->logo)}}" alt="logo" width="100px" height="100px"> 
                @endif
            </div>

            <div class="mb-3">
                <label for="Website Favicon">Website Favicon</label>
                <input type="file" name="favicon" class="form-control" accept="image/jpeg,image/png,image/gif">
            </div>
            <div class="mb-3">
                <label for="Description">Website Description</label>
                <textarea name="description" rows="3" class="form-control">@if($setting) {{$setting->description}} @endif</textarea>
            </div>
            <h4>SEO Part</h4>
            <div class="mb-3">
                <label for="meta_title">Meta Title</label>
                <input type="text" class="form-control" name="meta_title" @if($setting) value="{{$setting->meta_title}}" @endif>
            </div>
            <div class="mb-3">
                <label for="meta_keyword">Meta Keywords</label>
                <input type="text" class="form-control" name="meta_keyword" @if($setting) value="{{$setting->meta_keyword}}" @endif>
            </div>
            <div class="mb-3">
                <label for="meta_keyword">Meta Description</label>
                <input type="text" class="form-control" name="meta_description" @if($setting) value="{{$setting->meta_description}}" @endif>
            </div>
            <div class="mb-3">
                <input type="submit" class="btn btn-primary" value="Save Settings">
            </div>
            </form>
        </div>

    </div>
</div>
@endsection