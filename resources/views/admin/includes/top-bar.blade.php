<nav class="navbar default-layout-navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
    <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center"
        style="background-image: url('https://customdemo.website/apps/torah-memory-palace/public/uploads/logo/pic10.png');">
        <a class="navbar-brand brand-logo" href="{{ route('admin_dashboard') }}">
            <h3 style="font-size:16px;color:#808080;text-align: center">
                <img src="{{ asset('uploads/logo/torah-language.png') }}"
                    style="width: 60px;margin-right: 10px;height: 40px;" alt="">
                Torah
            </h3>
        </a>
        <a class="navbar-brand brand-logo-mini" href="{{ route('admin_dashboard') }}">
            <h3 class="text-white"><img src="{{ asset('uploads/logo/torah-language.jpg') }}"
                    style="width: 60px;margin:0px 5px;height: 40px;border:2px solid black;" alt=""></h3>
        </a>
    </div>
    <div class="navbar-menu-wrapper d-flex align-items-stretch">
        <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
            <span class="mdi mdi-menu text-white" style="font-size:22px;"></span>
        </button>
        <ul class="navbar-nav navbar-nav-right">
            <li class="nav-item nav-profile dropdown">
                <a class="nav-link dropdown-toggle" id="profileDropdown" href="#" data-toggle="dropdown"
                    aria-expanded="false">
                    {{-- <div class="nav-profile-img">
                        <img src="{{ asset('uploads/users/' . Auth::user()->profile) }}" alt="image">
                    </div> --}}
                    <div class="nav-profile-text">
                        <p class="mb-1">{{ Auth::user()->name }}</p>
                    </div>
                </a>
                <div class="dropdown-menu navbar-dropdown dropdown-menu-right p-0 border-0 font-size-sm"
                    aria-labelledby="profileDropdown" data-x-placement="bottom-end">
                    {{-- <div class="p-3 text-center" style="background:#0d60a7;">
                         <img class="img-avatar img-avatar48 img-avatar-thumb"
                            src="{{ asset('uploades/users/' . Auth::user()->profile) }}" alt="">
                    </div> --}}
                    <div class="p-2 text-white" style="background:#af792d;">
                        {{-- <a class="dropdown-item py-1 d-flex align-items-center justify-content-between"
                            href="">
                            <span>Profile</span>
                            <span class="p-0">
                                <i class="mdi mdi-account-outline ml-1"></i>
                            </span>
                        </a> --}}
                        <a href={{ route('logout.get') }}
                            class="dropdown-item py-1 d-flex align-items-center justify-content-between" href="">
                            <span style="color:black">Log Out</span>
                            <i class="mdi mdi-logout ml-1"></i>
                        </a>
                    </div>
                </div>
            </li>
        </ul>
        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button"
            data-toggle="offcanvas">
            <span class="mdi mdi-menu"></span>
        </button>
    </div>
</nav>
