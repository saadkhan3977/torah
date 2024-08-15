@extends('users.layouts.layout')

@section('title', 'Memory Palace | Drag')

@section('main-content')

<section class="dash1">
    <div class="container-fluid p-0">
        <div class="row">
            <div class="col-12 col-sm-12 col-md-3 col-lg-3 col-xl-3 col-xxl-3">
                @include('users.includes.list')
            </div>
            <div class="col-12 col-sm-12 col-md-9 col-lg-9 col-xl-9 col-xxl-9">
                <div class="dash5">
                    <div class="row">
                        <div class="col-12 col-sm-12 col-md-5 col-lg-5 col-xl-5 col-xxl-5">
                            <div class="dash11">
                                <h2>ANSWERS</h2>
                                <h4>Drag Your Answers</h4>
                                <div class="dash12">
                                    <ul>
                                        <li><a href="#">אמר רב סחורה </a></li>
                                        <li><a href="#">אמר רב הונא</a></li>
                                        <li><a href="#">אמר רב הדר</a></li>
                                        <li><a href="#">בחצר חבירו</a></li>
                                        <li><a href="#">שלא מדעתו</a></li>
                                    </ul>
                                    <ul>
                                        <li><a href="#">אמר רב סחורה </a></li>
                                        <li><a href="#">אמר רב הונא</a></li>
                                        <li><a href="#">אמר רב הדר</a></li>
                                        <li><a href="#">בחצר חבירו</a></li>
                                        <li><a href="#">שלא מדעתו</a></li>
                                    </ul>
                                </div>
                                <div class="dash12">
                                    <ul>
                                        <li><a href="#">אמר רב סחורה </a></li>
                                        <li><a href="#">אמר רב הונא</a></li>
                                        <li><a href="#">אמר רב הדר</a></li>
                                        <li><a href="#">בחצר חבירו</a></li>
                                        <li><a href="#">שלא מדעתו</a></li>
                                    </ul>
                                    <ul>
                                        <li><a href="#">אמר רב סחורה </a></li>
                                        <li><a href="#">אמר רב הונא</a></li>
                                        <li><a href="#">אמר רב הדר</a></li>
                                        <li><a href="#">בחצר חבירו</a></li>
                                        <li><a href="#">שלא מדעתו</a></li>
                                    </ul>
                                </div>
                                <div class="dash13">
                                    <a href="#">Done</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-sm-12 col-md-7 col-lg-7 col-xl-7 col-xxl-7">
                            <div class="dash14">
                                <img src="{{ asset('user-assets') }}/images/pic20.png" class="img-fluid" alt="img">
                                <img src="{{ asset('user-assets') }}/images/pic20.png" class="img-fluid" alt="img">
                            </div>
                            <div class="dash14">
                                <img src="{{ asset('user-assets') }}/images/pic20.png" class="img-fluid" alt="img">
                                <img src="{{ asset('user-assets') }}/images/pic20.png" class="img-fluid" alt="img">
                            </div>
                            <div class="dash15">
                                <a href="#">Prev</a>
                                <a href="#">Next</a>
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
