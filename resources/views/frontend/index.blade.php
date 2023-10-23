@extends('layouts.app')
@section('title',"TechByThakurBlog")
@section('description',"Home Page of Bloggin Website")
@section('keywords',"Home Page of Bloggin Website")
@section('content')
   @include('layouts/inc/frontend-navbar')

   <div class="bg-danger py-5">
      <div class="container">
         <div class="row">
            <div class="col-md-12">
      <div class="owl-carousel owl-theme categories-carousel py-6">
         @foreach ($all_categories as $all_categories_item)
         <a href="{{url('tutorial/'.$all_categories_item->slug)}}" class="text-decoration-none text-center">
            <div class="card">
               <img src="{{asset('uploads/category/'.$all_categories_item->image)}}" alt="Category Image" height="250px">
               <div class="card-body">
                  <h6 class="text-dark">{{$all_categories_item->name}}</h6>
               </div>
            </div>    
            </a>
         @endforeach   
     </div>
   </div>
   </div>
   </div>
   </div>
@endsection