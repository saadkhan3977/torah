@extends('users.layouts.layout')

@section('title', 'Memory Palace | Personal')

@section('main-content')

<section class="dash1">
    <div class="container-fluid p-0">
        <div class="row ">
            <div class="col-12 col-sm-12 col-md-2 col-lg-2 col-xl-2 col-xxl-2">
                @include('users.includes.list')
            </div>
            <div class="col-12 col-sm-12 col-md-10 col-lg-10 col-xl-10 col-xxl-10">
                <div class="dash22">
                    <div class="dash19">
                        <h2>PERSONALIZED QUIZ</h2>
                    </div>
                    <div class="dash21">
                        <button type="submit">Bava Kamma Daf 2 Daily Quiz</button>
                        <button type="submit">Bava Kamma Daf 4 Daily Quiz</button>
                        <button type="submit">Bava Kamma Daf 5 Daily Quiz</button>
                        <button type="submit">Bava Kamma Daf 7 Daily Quiz</button>
                        <button type="submit">Bava Kamma Daf 8 Daily Quiz</button>
                        <button type="submit">Bava Kamma Daf 8 Daily Quiz</button>
                    </div>
                    <div class="dash24">
                        <a href="#">Create Test</a>
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
