@extends('layouts.app')
@section('title',"$setting->meta_title")
@section('description',"$setting->meta_description")
@section('keywords',"$setting->meta_keyword")
@section('content')
  

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

   <div class="py-1 bg-gray">
      <div class="container">
         <div class="text-center p-4">
            <h4>Advertisment Here</h4>
         </div>
      </div>
   </div>

   <div class="py-5">
      <div class="container">
         <div class="row">
            <div class="col-md-12">
               <h4>TechByThakur Blog</h4>
               <div class="underline">
               </div>
               <p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for 'lorem ipsum' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).
                  It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for 'lorem ipsum' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).
               </p>
            </div>
         </div>
      </div>
   </div>

   <div class="py-5 bg-gray">
      <div class="container">
         <div class="row">
            <div class="col-md-12">
               <h4>All Categories</h4>
               <div class="underline">
               </div>
               <div class="row mt-2">
               @foreach ($all_categories as $i)
                   <div class="col-md-3 mb-2">
                     <div class="card">
                        <div class="card-body">
                           <a href="{{url('tutorial/'.$i->slug)}}" class="text-decoration-none text-center">
                              <h4 class="text-dark">{{$i->name}}</h4>
                           </a>
                        </div>
                     </div>
                   </div>
               @endforeach
                  </div>
            </div>
         </div>
      </div>
   </div>

   <div class="py-5">
      <div class="container">
         <div class="row">
            <div class="col-md-12">
               <h4>Latest Posts</h4>
               <div class="underline"></div>
            </div>
         </div>
               <div class="row mt-2">
                  <div class="col-md-8">
                     @foreach ($latestPosts as $item)
                       <div class="card mb-3 bg-gray">
                          <div class="card-body">
                             <a href="{{url('tutorial/'.$item->category->slug.'/'.$item->slug)}}" class="text-decoration-none">
                                <h4 class="text-dark">{{$item->name}}</h4>
                             </a>
                             <h6>Posted on:{{$item->created_at->format('d/m/y')}}</h6>
                          </div>
                       </div>
                     @endforeach
                  </div>
                  <div class="col-md-4">
                     <div class="text-center border py-3">
                        <h3>Advertisment Here</h3>
                     </div>
                  </div>
               </div>
      </div>
   </div>

@endsection