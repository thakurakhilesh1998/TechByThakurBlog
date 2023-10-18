@extends('layouts.master')

@section('title','View Posts')

@section('main')
<div class="container-fluid px-4 mt-4">
    <div class="card">
        <div class="card-header">
            <h4>View Posts
                <a href="{{url('admin/add-post')}}" class="btn btn-primary btn-sm float-end">Add Posts</a>
            </h4>

        </div>
        <div class="card-body">
            @if(session('message'))
            <div class="alert alert-success">{{session('message')}}</div>
            @endif
        </div>
    </div>
</div>
@endsection