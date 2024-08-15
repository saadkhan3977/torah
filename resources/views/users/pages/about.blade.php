@extends('users.layouts.layout')

@section('title', 'Memory Palace | About')

@section('main-content')
   

<section class="about1">
    <div class="container">
        <div class="row">
            <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12">
                <div class="about2">
                    <h2>About Us</h2>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">about us</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</section>


<section class="about3">
    <div class="container">
        <div class="row about4">
            <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6 col-xxl-6">
                <div class="about5">
                    <h2>About The <span class="home6">Company</span> </h2>
                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
                    <div class="about6">
                        <h2>30+</h2>
                        <p>Years of working Experience in this Industry</p>
                    </div>
                    <div class="about7">
                        <div class="about8">
                            <img src="{{ asset('user-assets') }}/images/pic9.png" class="img-fluid" alt="img">
                        </div>
                        <div class="about9">
                            <h4>Lorem Lpsum</h4>
                            <p>BUSINESS OWNERS, CMO’S, Companies</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-12 col-sm-12 col-md-5 col-lg-5 col-xl-5 col-xxl-5">
                <div>
                    <img src="{{ asset('user-assets') }}/images/pic8.png" class="img-fluid" alt="">
                </div>
            </div>
        </div>
    </div>
</section>


<section class="about10">
    <div class="container">
        <div class="row about11">
            <div class="col-12 col-sm-12 col-md-5 col-lg-5 col-xl-5 col-xxl-5">
                <div class="about12">
                    <h2>Our <span class="home6">Mission</span> </h2>
                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the </p>
                </div>
            </div>

            <div class="col-12 col-sm-12 col-md-5 col-lg-5 col-xl-5 col-xxl-5">
                <div class="about12">
                    <h2>Our <span class="home6">Vision</span> </h2>
                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also  </p>
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
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam</p>
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
                                    <img src="{{ asset('user-assets') }}/images/pic7.png" class="img-fluid" alt="">
                                </div>
                                <div class="home22">
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                                    <hr class="home29">
                                    <div class="home23">
                                        <img src="{{ asset('user-assets') }}/images/pic6.png" alt="img">
                                        <p>Mike Hardson</p>
                                    </div>
                                </div>
                            </div>

                            <div class="item">
                                <div class="home24">
                                    <img src="{{ asset('user-assets') }}/images/pic7.png" class="img-fluid" alt="">
                                </div>
                                <div class="home22">
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                                    <hr class="home29">
                                    <div class="home23">
                                        <img src="{{ asset('user-assets') }}/images/pic6.png" alt="img">
                                        <p>Mike Hardson</p>
                                    </div>
                                </div>
                            </div>

                            <div class="item">
                                <div class="home24">
                                    <img src="{{ asset('user-assets') }}/images/pic7.png" class="img-fluid" alt="">
                                </div>
                                <div class="home22">
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                                    <hr class="home29">
                                    <div class="home23">
                                        <img src="{{ asset('user-assets') }}/images/pic6.png" alt="img">
                                        <p>Mike Hardson</p>
                                    </div>
                                </div>
                            </div>

                            <div class="item">
                                <div class="home24">
                                    <img src="{{ asset('user-assets') }}/images/pic7.png" class="img-fluid" alt="">
                                </div>
                                <div class="home22">
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                                    <hr class="home29">
                                    <div class="home23">
                                        <img src="{{ asset('user-assets') }}/images/pic6.png" alt="img">
                                        <p>Mike Hardson</p>
                                    </div>
                                </div>
                            </div>

                            <div class="item">
                                <div class="home24">
                                    <img src="{{ asset('user-assets') }}/images/pic7.png" class="img-fluid" alt="">
                                </div>
                                <div class="home22">
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
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
