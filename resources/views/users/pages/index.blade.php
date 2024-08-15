@extends('users.layouts.layout')

@section('title', 'Memory Palace | Home')

@section('main-content')

    <div class="loader-container" id="bg">
        <svg width="350" height="350" viewBox="0 0 270 270" fill="none">
            <symbol id="container">
                <circle cx="135" cy="135" r="130" stroke="#02CAF7" stroke-width="10" />
            </symbol>
            <symbol id="liquid">
                <path
                    d="M0 71.0344C0 11.7849 73.6393 -15.5736 112.324 29.3037V29.3037C134.143 54.6151 171.778 58.8457 198.672 39.0103L206.818 33.002C231.973 14.4496 266.21 14.1976 291.635 32.3779V32.3779C318.355 51.4837 354.605 50.1371 379.833 29.1014L397.314 14.5252C414.946 -0.176172 439.21 -4.04721 460.54 4.43827V4.43827C484.364 13.9156 500 36.963 500 62.6028V399H0V71.0344Z"
                    fill="#02CAF7" fill-opacity="0.5" />
            </symbol>
            <symbol id="bubbles">
                <path
                    d="M91 10C91 15.5228 86.5228 20 81 20C75.4772 20 71 15.5228 71 10C71 4.47715 75.4772 0 81 0C86.5228 0 91 4.47715 91 10Z"
                    fill="#CEF4FD" />
                <path
                    d="M20 38C20 43.5228 15.5228 48 10 48C4.47715 48 0 43.5228 0 38C0 32.4772 4.47715 28 10 28C15.5228 28 20 32.4772 20 38Z"
                    fill="#CEF4FD" />
                <circle cx="58.5" cy="58.5" r="7.5" fill="#CEF4FD" />
                <circle cx="110.5" cy="78.5" r="7.5" fill="#CEF4FD" />
                <circle cx="131" cy="33" r="5" fill="#CEF4FD" />
                <circle cx="37" cy="111" r="5" fill="#CEF4FD" />
            </symbol>
            <defs>
                <clipPath id="circleClip">
                    <circle cx="135" cy="135" r="130" />
                </clipPath>
            </defs>

            <g class="loader">
                <g id="liquid1-clip" clip-path="url(#circleClip)">
                    <g>
                        <use id="liquid1" href="#liquid" transform="translate(0,180)" />
                        <use id="bubble1" href="#bubbles" transform="translate(60,100)" />
                    </g>
                </g>
                <g id="liquid2-clip" clip-path="url(#circleClip)">
                    <g>
                        <use id="liquid2" href="#liquid" fill-opacity="0.15" transform="translate(0,175)" />
                        <use id="bubble2" href="#bubbles" transform="translate(60,100)" />
                    </g>
                </g>
                <use href="#container" />
            </g>
        </svg>
    </div>

    <section class="home1">
        <div class="container">
            <div class="row home2">
                <div class="col-12 col-sm-12 col-md-5 col-lg-5 col-xl-5 col-xxl-5" data-aos="fade-right"
                    data-aos-duration="3000">
                    <div class="home3">
                        <h4>WELCOME TO THE MEMORY PALACE</h4>
                        <h2>Discover the <span class="home6">Power of Remembering</span> the Daf</h2>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
                            labore et dolore magna aliqua. Ut enim ad minim veniam</p>
                        <div class="home4">
                            <a href="#">CLICK HERE TO REGISTER</a>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6 col-xxl-6" data-aos="fade-left"
                    data-aos-duration="3000">
                    <div class="home5">
                        <video width="100%" controls="" preload="" muted="" autoplay="" loop="">
                            <source src="{{ asset('user-assets') }}/images/bannar.mp4">
                        </video>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="home7">
        <div class="container">
            <div class="row home8">
                <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6 col-xxl-6" data-aos="fade-up"
                    data-aos-duration="3000">
                    <div class="home9">
                        <img src="{{ asset('user-assets') }}/images/pic1.png" class="img-fluid" alt="img">
                    </div>
                </div>
                <div class="col-12 col-sm-12 col-md-5 col-lg-5 col-xl-5 col-xxl-5" data-aos="fade-down"
                    data-aos-duration="3000">
                    <div class="home10">
                        <h4>ABOUT US</h4>
                        <h2>Discover the <span class="home6">Power of Remembering</span> the Daf</h2>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
                            labore et dolore magna aliqua. Ut enim ad minim veniam</p>
                        <div class="home11">
                            <a href="#">CLICK HERE TO REGISTER</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="home12">
        <div class="container-fluid">
            <div class="row home14">
                <div class="col-12 col-sm-12 col-md-5 col-lg-5 col-xl-5 col-xxl-5">
                    <div class="home13">
                        <h2>The Power of <br> <span class="home6">The Memory Palace</span> </h2>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
                            labore et dolore magna aliqua. Ut enim ad minim veniam</p>
                        <div class="home11">
                            <a href="#">CLICK HERE TO REGISTER</a>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-12 col-md-7 col-lg-7 col-xl-7 col-xxl-7">
                    <div class="owl-carousel owl-theme" id="slider1">
                        <div class="item">
                            <img src="{{ asset('user-assets') }}/images/pic2.png" class="img-fluid" alt="img">
                        </div>
                        <div class="item">
                            <img src="{{ asset('user-assets') }}/images/pic3.png" class="img-fluid" alt="img">
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="home7">
        <div class="container">
            <div class="row home8">
                <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6 col-xxl-6" data-aos="flip-left"
                    data-aos-duration="3000">
                    <div class="home9">
                        <img src="{{ asset('user-assets') }}/images/pic4.png" class="img-fluid" alt="img">
                    </div>
                </div>
                <div class="col-12 col-sm-12 col-md-5 col-lg-5 col-xl-5 col-xxl-5" data-aos="flip-right"
                    data-aos-duration="3000">
                    <div class="home15">
                        <h2>Anyone Can <br> <span class="home6">Remember</span> the <span class="home6">Daf</span> with
                            <span class="home6">The Memory Palace</span>
                        </h2>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
                            labore et dolore magna aliqua. Ut enim ad minim veniam</p>
                        <div class="home11">
                            <a href="#">CLICK HERE TO REGISTER</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="home16">
        <div class="container">
            <div class="row home17">
                <div class="col-12 col-sm-12 col-md-5 col-lg-5 col-xl-5 col-xxl-5">
                    <div class="home19">
                        <h2>Take the <span class="home6">30 day</span> challenge! </h2>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
                            labore et dolore magna aliqua. Ut enim ad minim veniam</p>
                        <div class="home11">
                            <a href="#">CLICK HERE TO REGISTER</a>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6 col-xxl-6">
                    <div class="home18">
                        <img src="{{ asset('user-assets') }}/images/pic5.png" class="img-fluid" alt="img">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="home20">
        <div class="container">
            <div class="row">
                <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12">
                    <div class="row">
                        <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12">
                            <div class="home21">
                                <h6>TESTIMONIALS</h6>
                                <h2>What Our <br> <span class="home6">Customers Are Saying</span> </h2>
                            </div>
                        </div>
                    </div>

                    <div class="row mt-5">
                        <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12">
                            <div class="owl-carousel owl-theme" id="slider2">
                                <div class="item">
                                    <div class="home24">
                                        <img src="{{ asset('user-assets') }}/images/pic7.png" class="img-fluid"
                                            alt="">
                                    </div>
                                    <div class="home22">
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                                            incididunt ut labore et dolore magna aliqua. Lorem ipsum dolor sit amet,
                                            consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et
                                            dolore magna aliqua.</p>
                                        <hr class="home29">
                                        <div class="home23">
                                            <img src="{{ asset('user-assets') }}/images/pic6.png" alt="img">
                                            <p>Mike Hardson</p>
                                        </div>
                                    </div>
                                </div>

                                <div class="item">
                                    <div class="home24">
                                        <img src="{{ asset('user-assets') }}/images/pic7.png" class="img-fluid"
                                            alt="">
                                    </div>
                                    <div class="home22">
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                                            incididunt ut labore et dolore magna aliqua. Lorem ipsum dolor sit amet,
                                            consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et
                                            dolore magna aliqua.</p>
                                        <hr class="home29">
                                        <div class="home23">
                                            <img src="{{ asset('user-assets') }}/images/pic6.png" alt="img">
                                            <p>Mike Hardson</p>
                                        </div>
                                    </div>
                                </div>

                                <div class="item">
                                    <div class="home24">
                                        <img src="{{ asset('user-assets') }}/images/pic7.png" class="img-fluid"
                                            alt="">
                                    </div>
                                    <div class="home22">
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                                            incididunt ut labore et dolore magna aliqua. Lorem ipsum dolor sit amet,
                                            consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et
                                            dolore magna aliqua.</p>
                                        <hr class="home29">
                                        <div class="home23">
                                            <img src="{{ asset('user-assets') }}/images/pic6.png" alt="img">
                                            <p>Mike Hardson</p>
                                        </div>
                                    </div>
                                </div>

                                <div class="item">
                                    <div class="home24">
                                        <img src="{{ asset('user-assets') }}/images/pic7.png" class="img-fluid"
                                            alt="">
                                    </div>
                                    <div class="home22">
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                                            incididunt ut labore et dolore magna aliqua. Lorem ipsum dolor sit amet,
                                            consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et
                                            dolore magna aliqua.</p>
                                        <hr class="home29">
                                        <div class="home23">
                                            <img src="{{ asset('user-assets') }}/images/pic6.png" alt="img">
                                            <p>Mike Hardson</p>
                                        </div>
                                    </div>
                                </div>

                                <div class="item">
                                    <div class="home24">
                                        <img src="{{ asset('user-assets') }}/images/pic7.png" class="img-fluid"
                                            alt="">
                                    </div>
                                    <div class="home22">
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                                            incididunt ut labore et dolore magna aliqua. Lorem ipsum dolor sit amet,
                                            consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et
                                            dolore magna aliqua.</p>
                                        <hr class="home29">
                                        <div class="home23">
                                            <img src="{{ asset('user-assets') }}/images/pic6.png" alt="img">
                                            <p>Mike Hardson</p>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div>
        <a id="button" class="my-button show"></a>
    </div>

    

@endsection
