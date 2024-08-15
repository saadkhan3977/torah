<!DOCTYPE html>
<html>

<head>
    <title><?php if (isset($page) && is_string($page)) {
        echo $page;
    } else {
        echo 'The Memory Palace ';
    } ?></title>
    <meta name="description" content=<?php if (isset($pageDesc) && is_string($pageDesc)) {
        echo $pageDesc;
    } else {
        echo 'desired description';
    } ?> />
    <meta name="keywords" content=<?php if (isset($pageTag) && is_string($pageTag)) {
        echo $pageTag;
    } else {
        echo 'desired tag';
    } ?> />
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{ asset('user-assets') }}/css/bootstrap.css" rel="stylesheet" type="text/css">
    <link rel="icon" href="{{ asset('user-assets') }}/images/logo.png" type="image/png" sizes="114*114">
    <link href="{{ asset('user-assets') }}/css/custom.css" rel="stylesheet" type="text/css">
    <link href="{{ asset('user-assets') }}/css/animate.css" rel="stylesheet" type="text/css">
    <!-- link owl carasoul  -->
    <link href="{{ asset('user-assets') }}/css/owl.carousel.min.css" rel="stylesheet" type="text/css">
    <link href="{{ asset('user-assets') }}/css/owl.theme.default.min.css" rel="stylesheet" type="text/css">
    <!-- link slick carasoul  -->
    <link href="{{ asset('user-assets') }}/css/slick.css" rel="stylesheet" type="text/css">
    <link href="{{ asset('user-assets') }}/css/slick-theme.css" rel="stylesheet" type="text/css">

    <link href="https://site-assets.fontawesome.com/releases/v6.0.0/css/all.css" rel="stylesheet">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fancyapps/ui/dist/fancybox.css" />

</head>

<body>

    <div class="header">
        <nav class="navbar navbar-expand-lg">
            <div class="container">
                <a class="navbar-brand" href="{{ route('index.get') }}"><img
                        src="{{ asset('user-assets') }}/images/logo.png" class="logo1" alt="img"></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"><i class="fa-solid fa-bars"></i></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mx-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="{{ route('index.get') }}">HOME</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('about.get') }}">ABOUT US</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('faq.get') }}">FAQ'S</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownRequirement"
                                role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                SELECT A DAF
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdownRequirement">
                                <li><a class="dropdown-item" href="#">Requirement 1</a></li>
                                <li><a class="dropdown-item" href="#">Requirement 2</a></li>
                                <li><a class="dropdown-item" href="#">Requirement 3</a></li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('contact.get') }}">CONTACT US</a>
                        </li>
                        <li class="nav-item">
                            @if (Auth::user())
                                <a class="nav-link" href="{{ route('logout.get') }}">LOGOUT</a>
                            @else
                                <a class="nav-link" href="{{ route('login.get') }}">LOGIN</a>
                            @endif
                        </li>
                    </ul>
                    @if (Auth::user())
                        <span class="nav_flex">
                            <span class="nav_glass">
                                <a href="{{ route('dashboard.get') }}">Dashboard</a>
                            </span>
                        </span>
                    @endif
                </div>
            </div>
        </nav>
    </div>
