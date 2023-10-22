@extends('layouts/app')

@section('content')
@include('layouts/inc/frontend-navbar')
    <div class="py-4">
        <div class="container">
            <div class="row">
                <div class="col-md-9">
                    <div class="category-heading">
                        <h4>{{$category->name}}</h4>
                    </div>
                    @forelse ($posts as $postitem)
                    <div class="card card-shadow mt-4">
                        <div class="card-body">
                            <a href="{{url('tutorial/'.$category->slug.'/'.$postitem->name)}}" class="text-decoration-none">
                                <h2>{{$postitem->name}}</h2>
                            </a>
                            <h6>Posted On:{{$postitem->created_at->format('d/m/y')}} <span class="ms-3">Posted By:{{$postitem->user->name}}</span></h6>
                        </div>
                    </div> 
                    @empty
                    <div class="card card-shadow mt-4">
                        <div class="card-body">
                            <h2>No post available</h2>
                        </div>
                    </div>  
                    @endforelse
                    <div class="your-pagination mt-4">
                        {{$posts->links()}}
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="border p-2">
                        <h4>Advertising Area</h4>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection