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
                <input type="text" name="website_name" class="form-control">
            </div>

            <div class="mb-3">
                <label for="WebStie Name">Website Logo</label>
                <input type="file" name="logo" class="form-control" accept="image/jpeg,image/png,image/gif">
            </div>

            <div class="mb-3">
                <label for="Website Favicon">Website Favicon</label>
                <input type="file" name="favicon" class="form-control" accept="image/jpeg,image/png,image/gif">
            </div>
            <div class="mb-3">
                <label for="Description">Website Description</label>
                <textarea name="description" rows="3" class="form-control"></textarea>
            </div>
            <h4>SEO Part</h4>
            <div class="mb-3">
                <label for="meta_title">Meta Title</label>
                <input type="text" class="form-control" name="meta_title">
            </div>
            <div class="mb-3">
                <label for="meta_keyword">Meta Keywords</label>
                <input type="text" class="form-control" name="meta_keyword">
            </div>
            <div class="mb-3">
                <label for="meta_keyword">Meta Description</label>
                <input type="text" class="form-control" name="meta_description">
            </div>
            <div class="mb-3">
                <input type="submit" class="btn btn-primary" value="Save Settings">
            </div>
            </form>
        </div>

    </div>
</div>
@endsection