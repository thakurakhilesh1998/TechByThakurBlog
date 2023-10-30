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
               <h4>TechByThakur</h4>
               <div class="underline">
               </div>
               <p>TechByThakur is your gateway to the ever-evolving world of technology and the internet. Our blog is your one-stop destination for staying informed about the latest trends, breakthroughs, and innovations in the tech industry. We deliver a comprehensive and reader-friendly exploration of the digital realm, providing you with in-depth insights and updates on cutting-edge technologies, internet phenomena, and all things tech-related.
                  At TechByThakur, we pride ourselves on translating complex tech jargon into easy-to-understand language, making it accessible to everyone. Whether you're a tech enthusiast, a curious newcomer, or someone looking to stay ahead in the digital age, we've got you covered. Explore the world of technology with us, stay informed, and empower yourself with the knowledge you need to navigate the fast-paced world of tech and the internet. Welcome to TechByThakur, where technology meets simplicity.
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