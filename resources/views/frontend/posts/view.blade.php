@extends('layouts/app')
@section('title',"$post->meta_title")
@section('description',"$post->meta_description")
@section('keywords',"$post->meta_keywords")
@section('content')
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
                        <div class="card-body post-description">
                            {!! $post->description !!}
                        </div>
                    </div>

                    <div class="comment-area mt-4">
                        <div class="card card-body">
                            <h6 class="catd-title">Leave a Comment</h6>
                            <form action="" method="post">
                                <textarea name="comment_body" class="form-control" rows="3" required></textarea>
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </form>
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