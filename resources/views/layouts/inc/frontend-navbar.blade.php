<div class="global-navbar">
    <div class="container pb-2">
        <div class="row">
            <div class="col-md-3">
                <img src="{{asset('assets/images/logo.png')}}" class="w-50" alt="logo">
            </div>
            <div class="col-md-9">
                <div class="border text-center p-2 my-auto">
                    <h4>Your Advertisment will come here</h4>
                </div>
            </div>
        </div>
    </div>
    <nav class="navbar navbar-expand-lg navbar-dark bg-green">
        <div class="container">
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
              {{-- <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  Dropdown
                </a>
                <ul class="dropdown-menu">
                  <li><a class="dropdown-item" href="#">Action</a></li>
                  <li><a class="dropdown-item" href="#">Another action</a></li>
                  <li><hr class="dropdown-divider"></li>
                  <li><a class="dropdown-item" href="#">Something else here</a></li>
                </ul>
              </li> --}}
        
            </ul>
          </div>
        </div>
      </nav>
</div>