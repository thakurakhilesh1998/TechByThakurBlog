@extends('layouts/app')
@section('title',"$post->meta_title")
@section('description',"$post->meta_description")
@section('keywords',"$post->meta_keywords")
@section('content')
@include('layouts/inc/frontend-navbar')
    <div class="py-4">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="category-heading">
                        {!! $post->name !!}
                    </div>
                    <div class="my-2">
                        <h6>{{$post->category->name.'/'.$post->slug}}</h6>
                    </div>
                    <div class="card card-shadow mt-4">
                        <div class="card-body">
                            {!! $post->description !!}
                        </div>
                    </div>
                  
                </div>
                <div class="col-md-4">
                    <div class="border p-2 mx-4">
                        <h4>Advertising Area</h4>
                    </div>
                    <div class="border p-2 mx-4">
                        <h4>Advertising Area</h4>
                    </div>
                    <div class="border p-2 mx-4">
                        <h4>Advertising Area</h4>
                    </div>
                    <div class="card mt-3 mx-4">
                        <div class="card-header">
                            <h4>Latest Posts</h4>
                        </div>
                        <div class="card-body">
                            @foreach ($latestPosts as $item)
                            <a href="{{url('tutorial/'.$item->category->slug.'/'.$item->slug)}}" class="text-decoration-none"><h6>{{$item->name}}</h6></a>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection