<div class="navbar-default sidebar" role="navigation">
    <div class="sidebar-nav navbar-collapse">
        <ul class="nav" id="side-menu">

            <li>
                <a href="{{route('post.create')}}"><i class="fa fa-dashboard fa-fw"></i> View Job Post</a>
            </li>
            <li>
                <a href="#"><i class="fa fa-bar-chart-o fa-fw"></i> Applicant<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="{{route('applicant.index')}}">Register Applicant</a>
                    </li>
                    <li>
                        <a href="{{route('profile.index')}}">Make Profile</a>
                    </li>

                </ul>
                <!-- /.nav-second-level -->
            </li> <li>
                <a href="#"><i class="fa fa-bar-chart-o fa-fw"></i> Company<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="{{route('company.index')}}">Register Company</a>
                    </li>
                    <li>
                        <a href="{{route('post.index')}}">Post aJob</a>
                    </li>

                </ul>
                <!-- /.nav-second-level -->
            </li>

        </ul>
    </div>
    <!-- /.sidebar-collapse -->
</div>