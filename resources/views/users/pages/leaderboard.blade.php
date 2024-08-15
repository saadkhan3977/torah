@extends('users.layouts.layout')

@section('title', 'Memory Palace | Leaderboard')

@section('main-content')

    <section class="dash1">
        <div class="container-fluid p-0">
            <div class="row ">
                <div class="col-12 col-sm-12 col-md-3 col-lg-3 col-xl-3 col-xxl-3">
                    @include('users.includes.list')
                </div>
                <div class="col-12 col-sm-12 col-md-9 col-lg-9 col-xl-9 col-xxl-9">
                    <div class="dash32">
                        <div class="dash25">
                            <h2>LEADERBOARD</h2>
                        </div>
                        <div class="row dash27">
                            <div class="col-12 col-sm-12 col-md-3 col-lg-3 col-xl-3 col-xxl-3">
                                <div class="dash26">
                                    <div class="dash34">
                                        <img src="{{ asset('user-assets') }}/images/pic22.png" class="img-fluid"
                                            alt="img">
                                    </div>
                                    <h2>JOHN FERRECHER</h2>
                                    <a href="#">View Profile</a>
                                    <div class="dash28">
                                        <img src="{{ asset('user-assets') }}/images/pic23.png" class="img-fluid"
                                            alt="img">
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-sm-12 col-md-3 col-lg-3 col-xl-3 col-xxl-3">
                                <div class="dash29">
                                    <div class="dash34">
                                        <img src="{{ asset('user-assets') }}/images/pic22.png" class="img-fluid"
                                            alt="img">
                                    </div>
                                    <h2>JOHN FERRECHER</h2>
                                    <a href="#">View Profile</a>
                                    <div class="dash28">
                                        <img src="{{ asset('user-assets') }}/images/pic24.png" class="img-fluid"
                                            alt="img">
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-sm-12 col-md-3 col-lg-3 col-xl-3 col-xxl-3">
                                <div class="dash30">
                                    <div class="dash34">
                                        <img src="{{ asset('user-assets') }}/images/pic22.png" class="img-fluid"
                                            alt="img">
                                    </div>
                                    <h2>JOHN FERRECHER</h2>
                                    <a href="#">View Profile</a>
                                    <div class="dash28">
                                        <img src="{{ asset('user-assets') }}/images/pic23.png" class="img-fluid"
                                            alt="img">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row dash31">
                            <div class="col-12 col-sm-12 col-md-10 col-lg-10 col-xl-10 col-xxl-10">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th scope="col">Rank</th>
                                            <th scope="col">Name</th>
                                            <th scope="col">Profile</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <th scope="row">04</th>
                                            <td>JOHN FERRECHER</td>
                                            <td>View Profile</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">05</th>
                                            <td>JOHN FERRECHER</td>
                                            <td>View Profile</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">06</th>
                                            <td>JOHN FERRECHER</td>
                                            <td>View Profile</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">07</th>
                                            <td>JOHN FERRECHER</td>
                                            <td>View Profile</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">08</th>
                                            <td>JOHN FERRECHER</td>
                                            <td>View Profile</td>
                                        </tr>
                                    </tbody>
                                </table>
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
