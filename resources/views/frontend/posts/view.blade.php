@extends('layouts/app')

@section('content')
@include('layouts/inc/frontend-navbar')
    <div class="py-4">
        <div class="container">
            <div class="row">
                <div class="col-md-9">
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
                <div class="col-md-3">
                    <div class="border p-2 mx-4">
                        <h4>Advertising Area</h4>
                    </div>
                    <div class="border p-2 mx-4">
                        <h4>Advertising Area</h4>
                    </div>
                    <div class="border p-2 mx-4">
                        <h4>Advertising Area</h4>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection