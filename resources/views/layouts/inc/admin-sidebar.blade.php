<div id="layoutSidenav_nav">
    <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
        <div class="sb-sidenav-menu">
            <div class="nav">
                <div class="sb-sidenav-menu-heading">Core</div>
                <a class="nav-link {{Request::is('admin/dashboard')?"active":''}}" href="{{url('admin/dashboard')}}">
                    <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                    Dashboard
                </a>
                <div class="sb-sidenav-menu-heading">Interface</div>
                <a class="nav-link  {{Request::is('admin/add-category') || Request::is('admin/category') ? 'collapse':'collapsed'}}" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                    <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                    Category
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="{{Request::is('admin/add-category') || Request::is('admin/category') ? 'show':'collapse'}}" id="collapseLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link {{Request::is('admin/add-category')?'active':''}}" href="{{url('admin/add-category')}}">Add Category</a>
                        <a class="nav-link {{Request::is('admin/category')?'active':''}}" href="{{url('admin/category')}}">View Category</a>
                    </nav>
                </div>

                <a class="nav-link collapsed {{Request::is('admin/add-posts') || Request::is('admin/posts') ? 'show':'collapse'}}" href="#" data-bs-toggle="collapse" data-bs-target="#collapsePosts" aria-expanded="false" aria-controls="collapseLayouts">
                    <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                    Posts
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="{{Request::is('admin/add-posts') || Request::is('admin/posts') ? 'show':'collapse'}}" id="collapsePosts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link {{Request::is('admin/add-posts')?"active":''}}" href="{{url('admin/add-posts')}}">Add Posts</a>
                        <a class="nav-link {{Request::is('admin/posts')?"active":''}}" href="{{url('admin/posts')}}">View Posts</a>
                    </nav>
                </div>
                <a class="nav-link {{Request::is('admin/users')?'active':''}}" href="{{url('admin/users')}}">
                    <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                    Users
                </a>
                <div class="sb-sidenav-menu-heading">Addons</div>
                <a class="nav-link" href="charts.html">
                    <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                    Charts
                </a>
                <a class="nav-link" href="tables.html">
                    <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                    Tables
                </a>
            </div>
        </div>
        <div class="sb-sidenav-footer">
            <div class="small">Logged in as:</div>
            Start Bootstrap
        </div>
    </nav>
</div>