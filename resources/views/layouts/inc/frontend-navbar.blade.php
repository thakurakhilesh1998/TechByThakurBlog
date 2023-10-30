<div class="global-navbar bg-white">
    <div class="container pb-2">
        <div class="row">
            <div class="col-md-3 d-none d-sm-none d-md-inline">
              @php
              $setting=App\Models\Setting::find(1);
              @endphp
                <img src="{{asset('uploads/settings/').'/'.$setting->logo}}" class="img-fluid" style="height: 120px!important" alt="logo">
            </div>
            <div class="col-md-9">
                <div class="border text-center p-2 my-auto">
                    <h4>Your Advertisment will come here</h4>
                </div>
            </div>
        </div>
    </div>
  </div>
  <div class="sticky-top">
    <nav class="navbar navbar-expand-lg navbar-dark bg-green">
        <div class="container">
          <a href="" class="navbar-brand d-inline d-sm-inline d-md-none">
            <img src="{{asset('uploads/settings/').'/'.$setting->logo}}" class="img-fluid" style="height: 80px!important" alt="logo">
          </a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link" aria-current="page" href="{{url('/')}}">Home</a>
              </li>
              @php
               $categories=App\Models\Category::where('navbar_status','0')->where('status','0')->get();

              @endphp
            @foreach ($categories as $cat)
            <li class="nav-item">
                <a class="nav-link" href="{{url("tutorial/".$cat->slug)}}">{{$cat->name}}</a>
              </li>  
            @endforeach
            @if(Auth::check())
              <li>
                <a href="{{ route('logout') }}" class="nav-link btn btn-danger" onclick="event.preventDefault(); document.getElementById('logout-form').submit()">Logout</a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
                </form>
              </li>
              @else
                <li>
                  <a href="{{route('login')}}" class="nav-link">Login</a>
                </li>
              @endif
            </ul>
          </div>
        </div>
      </nav>
    </div>