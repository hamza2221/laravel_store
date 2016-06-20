<nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="{{url('/')}}">Research Company </a>
                <p>{{Auth::user()->role}} panel</p>
            </div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right">
				<li><a href="{{url('/logout')}}"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
            </ul>
            <!-- /.navbar-top-links -->
			<div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <li class="sidebar-search">
                            <h2>{{Auth::user()->name}} <small>Online</small></h2>
							<p>{{Auth::user()->email}}</p>
                                                        
                            <!-- /input-group -->
                        </li>
                        <li>
                            <a href="{{url('user')}}"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
                        </li>

                        <li>
                            <a href="{{url('user/company')}}"><i class="fa fa-table fa-fw"></i> Company </a>
                        </li>
                        

                        <li>
                            <a href="{{url('user/sector')}}"><i class="fa fa-table fa-fw"></i> Sector </a>
                        </li>

                        <li>
                            <a href="{{url('user/research')}}"><i class="fa fa-table fa-fw"></i> Research </a>
                        </li>

                        <li>
                            <a href="{{url('user/event')}}"><i class="fa fa-table fa-fw"></i> Events </a>
                        </li>
						<li>
                            <a href="{{url('user/myPrefrences')}}"><i class="fa fa-table fa-fw"></i> My Prefrences </a>
                        </li>
                        
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>