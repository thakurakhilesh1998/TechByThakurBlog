@extends('layouts/app')

@section('content')
@include('layouts/inc/frontend-navbar')
    <div class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-9">
                    <div class="category-heading">
                        <h4>{{$category->name}}</h4>
                    </div>
                </div>
                <div class="col-md-3">
                    <h4>Advertising Area</h4>
                </div>
            </div>
        </div>
    </div>
@endsection