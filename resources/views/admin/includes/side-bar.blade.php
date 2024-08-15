<nav class="sidebar sidebar-offcanvas" id="sidebar" style="background:#af792d;">
    <ul class="nav">
        <li class="nav-item nav-category"></li>
        <li class="nav-item">
            <a class="nav-link" href="{{route('admin_dashboard')}}">
                <!--route('admin.index.get')-->
                <!-- mdi mdi-cube menu-icon -->
                <span class="icon-bg"><i class="mdi mdi-glasses menu-icon" style="color:#523308;"></i></span>
                <span class="menu-title" style="color:white;">Dashboard</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{route ('admin.users.get')}}">
                 <!--route('admin.users.get')-->
                <span class="icon-bg"><i class="mdi mdi-cube menu-icon" style="color:#523308;"></i></span>
                <span class="menu-title" style="color:white;">Users</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{route('admin.book')}}">
                <!---->
                <!--<span class="icon-bg"><i class="fas fa-cog"></i></span>-->
                <span class="icon-bg"><i class="mdi mdi-message menu-icon" style="color:#523308;"></i></span>
                <span class="menu-title" style="color:white;">Book</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{route('admin.daily.quiz')}}">
                <!---->
                <!--<span class="icon-bg"><i class="fas fa-cog"></i></span>-->
                <span class="icon-bg"><i class="mdi mdi-message menu-icon" style="color:#523308;"></i></span>
                <span class="menu-title" style="color:white;">Quiz</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{route('admin.trending')}}">
                <!---->
                <!--<span class="icon-bg"><i class="fas fa-cog"></i></span>-->
                <span class="icon-bg"><i class="mdi mdi-message menu-icon" style="color:#523308;"></i></span>
                <span class="menu-title" style="color:white;">Trending</span>
            </a>
        </li>
        {{--<li class="nav-item">
            <a class="nav-link" href="">
                <!--route('admin.inspections.get')-->
                <span class="icon-bg"><i class="mdi mdi-glasses menu-icon"></i></span>
                <span class="menu-title" style="color:white;">Inspections Data</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
                <span class="icon-bg"><i class="mdi mdi-cart menu-icon"></i></span>
                <span class="menu-title">Requirements</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-basic">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href=""></a>
                    </li>
                    <li class="nav-item"> <a class="nav-link" href=""></a>
                    </li>
                </ul>
            </div>
        </li>--}}
        
    </ul>
</nav>
