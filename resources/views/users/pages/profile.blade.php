@extends('users.layouts.layout')

@section('title', 'Memory Palace | Profile')

@section('main-content')


<section class="about1">
    <div class="container">
        <div class="row">
            <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12">
                <div class="about2">
                    <h2>PROFILE</h2>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{route('index.get')}}">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Profile</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="profile1">
    <div class="container">
        <div class="row">
            <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12">
                <div class="profile2">
                    <div class="profile8">
                        <div class="profile5">
                            <div class="profile3">
                                <img src="{{ asset('user-assets') }}/images/pic25.jpg" class="img-fluid" alt="img">
                            </div>
                            <div class="profile4">
                                <h2>Lorem Lpsum</h2>
                                <h4>BUSINESS OWNERS</h4>
                                <p>CMO’S, Companies</p>
                                <div class="rate">
                                    <input type="radio" id="star5" name="rate" value="5" />
                                    <label for="star5" title="text">5 stars</label>
                                    <input type="radio" id="star4" name="rate" value="4" />
                                    <label for="star4" title="text">4 stars</label>
                                    <input type="radio" id="star3" name="rate" value="3" />
                                    <label for="star3" title="text">3 stars</label>
                                    <input type="radio" id="star2" name="rate" value="2" />
                                    <label for="star2" title="text">2 stars</label>
                                    <input type="radio" id="star1" name="rate" value="1" />
                                    <label for="star1" title="text">1 star</label>
                                </div>
                            </div>
                        </div>
                        <div class="profile6">
                            <div class="profile7">
                                <button type="submit">Add Feedback</button>
                            </div>
                            <div class="profile9">
                                <img src="{{ asset('user-assets') }}/images/pic21.png" class="img-fluid" alt="img">
                            </div>
                            <div class="profile7">
                                <button type="submit">Book Appointment</button>
                            </div>
                        </div>
                    </div>
                    <div class="tab-menu">
                        <ul>
                            <li><a href="#" class="tab-a active-a" data-id="tab1">Locations</a></li>
                            <li><a href="#" class="tab-a" data-id="tab2">Overview</a></li>
                            <li><a href="#" class="tab-a" data-id="tab3">Reviews</a></li>
                        </ul>
                    </div><!--end of tab-menu-->
                    <div class="tab tab-active" data-id="tab1">

                        <div class="mapouter">
                            <div class="gmap_canvas"><iframe class="gmap_iframe" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="{{ asset('user-assets') }}/https://maps.google.com/maps?width=600&amp;height=400&amp;hl=en&amp;q=Brooklyn, NY 11201, United States&amp;t=&amp;z=14&amp;ie=UTF8&amp;iwloc=B&amp;output=embed"></iframe><a href="https://connectionsgame.org/">Connections NYT</a></div>
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

                    </div><!--end of tab one-->

                    <div class="tab " data-id="tab2">
                        <h2>About The Company</h2>
                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
                    </div><!--end of tab two-->
                    <div class="tab " data-id="tab3">
                        <h2>About The Company</h2>
                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
                    </div><!--end of tab three-->
                </div>
            </div>
        </div>
    </div>
</section>

<div>
    <a id="button" class="my-button show"></a>
</div>

@endsection
