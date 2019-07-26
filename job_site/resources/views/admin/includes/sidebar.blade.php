{{--<div class="navbar-default sidebar" role="navigation">--}}
{{--<div class="sidebar-nav navbar-collapse">--}}
{{--<ul class="nav" id="side-menu">--}}

{{--<li>--}}
{{--<a href="{{route('post.create')}}"><i class="fa fa-dashboard fa-fw"></i> View Job Post</a>--}}
{{--</li>--}}
{{--<li>--}}
{{--<a href="#"><i class="fa fa-bar-chart-o fa-fw"></i> Applicant<span class="fa arrow"></span></a>--}}
{{--<ul class="nav nav-second-level">--}}
{{--<li>--}}
{{--<a href="{{route('applicant.index')}}">Register Applicant</a>--}}
{{--</li>--}}
{{--<li>--}}
{{--<a href="{{route('profile.index')}}">Make Profile</a>--}}
{{--</li>--}}

{{--</ul>--}}
{{--<!-- /.nav-second-level -->--}}
{{--</li> <li>--}}
{{--<a href="#"><i class="fa fa-bar-chart-o fa-fw"></i> Company<span class="fa arrow"></span></a>--}}
{{--<ul class="nav nav-second-level">--}}
{{--<li>--}}
{{--<a href="{{route('company.index')}}">Register Company</a>--}}
{{--</li>--}}
{{--<li>--}}
{{--<a href="{{route('post.index')}}">Post aJob</a>--}}
{{--</li>--}}

{{--</ul>--}}
{{--<!-- /.nav-second-level -->--}}
{{--</li>--}}

{{--</ul>--}}
{{--</div>--}}
{{--<!-- /.sidebar-collapse -->--}}
{{--</div>--}}

<aside class="main-sidebar sidebar-dark-primary elevation-4">

    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="info">
                <router-link to="/" class="d-block">Alexander Pierce</router-link>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">

                <li class="nav-item has-treeview">
                    <a class="nav-link" href="{{route('post.index')}}">Dashboard</a>
                </li>
                <li class="nav-item has-treeview">
                    <a class="nav-link" href="{{route('/')}}">View Jobs</a>
                </li>

                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <p>
                            Registration
                            <i class="fa fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <router-link :to="{path:'/register-user'}" class="nav-link">
                                <i class="nav-icon fa fa-circle-o text-danger"></i>
                                <p class="text">Registration Form</p>
                            </router-link>
                        </li>
                        <li class="nav-item">
                            <router-link :to="{path:'/login-form'}" class="nav-link">
                                <i class="nav-icon fa fa-circle-o text-danger"></i>
                                <p class="text">Login Form</p>
                            </router-link>
                        </li>


                        <li class="nav-item">
                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                  style="display: none;">
                                @csrf
                            </form>
                        </li>


                    </ul>

                </li>


                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <p>
                            Post
                            <i class="fa fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('post.index')}}" class="nav-link">
                                <i class="nav-icon fa fa-circle-o text-danger"></i>
                                <p class="text">Post Job</p>
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>

        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>