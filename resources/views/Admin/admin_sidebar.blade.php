<nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="{{url('/admin/dashboard')}}">Research Company</a>
    </div>
    <!-- /.navbar-header -->

    <ul class="nav navbar-top-links navbar-right">
        <li><a href="{{url('/logout')}}"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
    </ul>
    <!-- /.navbar-top-links -->
    <div class="navbar-default sidebar" role="navigation">
        <div class="sidebar-nav navbar-collapse">
            <ul  class="nav" id="side-menu">
                <li class="sidebar-search">
                    <h2>{{Auth::user()->name}} <small>Online</small></h2>
                    <small>{{Auth::user()->email}}</small>
                    <!-- /input-group -->
                </li>
                <li >
                    <a href="{{url('admin/dashboard')}}"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
                </li>




                <li>
                    <a href="{{url('admin/products')}}"><i class="fa fa-table fa-fw"></i> Products </a>
                </li>

                <li>
                    <a href="{{url('admin/categories')}}"><i class="fa fa-table fa-fw"></i> Categories</a>
                </li>
                <li>
                    <a href="{{url('admin/tags')}}"><i class="fa fa-tag fa-fw"></i> Tags</a>
                </li>
                <li>
                    <a href="{{url('admin/orders')}}"><i class="fa fa-table fa-fw"></i> Orders</a>
                </li>




                <li>
                    <a href="{{url('admin/user')}}"><i class="fa fa-table fa-fw"></i> Admins / Users </a>
                </li>
                <li>
                    <a href="{{url('admin/myPrefrences')}}"><i class="fa fa-table fa-fw"></i> My Prefrences </a>
                </li>

            </ul>
        </div>
        <!-- /.sidebar-collapse -->
    </div>
    <!-- /.navbar-static-side -->
</nav>