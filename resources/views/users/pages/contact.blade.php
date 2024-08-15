@extends('users.layouts.layout')

@section('title', 'Memory Palace | Contact')

@section('main-content')

<section class="about1">
    <div class="container">
        <div class="row">
            <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12">
                <div class="about2">
                    <h2>Contact Us</h2>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Contact us</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="contact1">
    <div class="container">
        <div class="row contact2">
            <div class="col-12 col-sm-12 col-md-9 col-lg-9 col-xl-9 col-xxl-9">
                <div class="contact3">
                    <h2>We Are Here To Help You</h2>
                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s..</p>
                    <form class="mt-4">
                        <div class="contact4">
                            <div class="mb-3">
                                <input type="email" class="form-control contact5" placeholder="FIRST NAME">
                            </div>
                            <div class="mb-3">
                                <input type="email" class="form-control contact5" placeholder="LAST NAME">
                            </div>
                        </div>
                        <div class="mb-3">
                            <input type="password" class="form-control contact6" placeholder="EMAIL ADDRESS">
                        </div>
                        <div class="mb-3">
                            <input type="password" class="form-control contact6" placeholder="PHONE NUMBER">
                        </div>
                        <div class="mb-3">
                            <input type="password" class="form-control contact6" placeholder="YOUR QUERY">
                        </div>

                        <button type="submit" class="btn contact7">Submit</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
</section>


<section class="contact8">
    <div class="container">
        <div class="row contact9">
            <div class="col-12 col-sm-12 col-md-9 col-lg-9 col-xl-9 col-xxl-9">
                <div class="row">
                    <div class="col-12 col-sm-12 col-md-4 col-lg-4 col-xl-4 col-xxl-4">
                        <div class="contact10">
                            <i class="fa-regular fa-phone-volume"></i>
                            <h2>CALL</h2>
                            <p>+000 888 22222</p>
                        </div>
                    </div>
                    <div class="col-12 col-sm-12 col-md-4 col-lg-4 col-xl-4 col-xxl-4">
                        <div class="contact10">
                            <i class="fa-regular fa-envelope"></i>
                            <h2>EMAIL</h2>
                            <p>info@yourcomaony.com</p>
                        </div>
                    </div>
                    <div class="col-12 col-sm-12 col-md-4 col-lg-4 col-xl-4 col-xxl-4">
                        <div class="contact10">
                            <i class="fa-regular fa-location-dot"></i>
                            <h2>ADDRESS</h2>
                            <p>Brooklyn, NY 11201, United States</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<section class="contact11">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12 p-0">
                <div class="contact12">
                    <h2>Direction</h2>
                </div>

                <div class="mapouter">
                    <div class="gmap_canvas"><iframe class="gmap_iframe" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?width=600&amp;height=400&amp;hl=en&amp;q=Brooklyn, NY 11201, United States&amp;t=&amp;z=14&amp;ie=UTF8&amp;iwloc=B&amp;output=embed"></iframe><a href="https://connectionsgame.org/">Connections NYT</a></div>
                    <style>
                        .mapouter {
                            position: relative;
                            text-align: right;
                            width: 100%;
                            height: 500px;
                        }

                        .gmap_canvas {
                            overflow: hidden;
                            background: none !important;
                            width: 100%;
                            height: 500px;
                        }

                        .gmap_iframe {
                            width: 100% !important;
                            height: 500px !important;
                        }
                    </style>
                </div>

            </div>
        </div>
    </div>
</section>




<div>
    <a id="button" class="my-button show"></a>
</div>

@endsection
