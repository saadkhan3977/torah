@extends('users.layouts.layout')

@section('title', 'Memory Palace | Test')

@section('main-content')

    <section class="dash1">
        <div class="container-fluid p-0">
            <div class="row ">
                <div class="col-12 col-sm-12 col-md-3 col-lg-3 col-xl-3 col-xxl-3">
                    @include('users.includes.list')
                </div>
                <div class="col-12 col-sm-12 col-md-9 col-lg-9 col-xl-9 col-xxl-9">
                    <div class="dash16">
                        <h2>TESTING</h2>
                        <div class="dash17">
                            <a href="{{route('daily.get')}}">Daily Quiz</a>
                        </div>
                        <div class="dash33">
                            <img src="{{ asset('user-assets') }}/images/pic21.png" class="img-fluid" alt="img">
                        </div>
                        <div class="dash17">
                            <a href="{{route('daily.get')}}">Personalized Test</a>
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
