@extends('users.layouts.layout')

@section('title', 'Memory Palace | Login')

@section('main-content')

    <section class="about1">
        <div class="container">
            <div class="row">
                <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12">
                    <div class="about2">
                        <h2>LOGIN IN</h2>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <section class="login1">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-sm-12 col-md-10 col-lg-10 col-xl-10 col-xxl-10">
                    <div class="login2">
                        <div class="row login7">
                            <div class="col-12 col-sm-12 col-md-5 col-lg-5 col-xl-5 col-xxl-5">
                                <div class="login3">
                                    <h2>Login To DAF</h2>
                                    <form action="{{ route('login.post') }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <div class="mb-3 reg4">
                                            <label for="exampleInputEmail1" class="form-label">EMAIL ADDRESS *</label>
                                            <input type="email" name="email" class="form-control"
                                                placeholder="contact@gmail.com">
                                        </div>
                                        <div class="mb-3 reg4">
                                            <label for="exampleInputPassword1" class="form-label">PASSWORD *</label>
                                            <input type="password" name="password" class="form-control"
                                                placeholder="********">
                                        </div>
                                        <div class="login5">
                                            <div class="login4">
                                                <a href="{{ route('register.get') }}">Signup</a>
                                            </div>
                                            <div class="login4">
                                                <a href="{{ route('forgot.get') }}">Forgot Password ?</a>
                                            </div>
                                        </div>
                                        <div class="reg3">
                                            <button type="submit">Log in</button>
                                        </div>
                                    </form>

                                </div>
                            </div>
                            <div class="col-12 col-sm-12 col-md-2 col-lg-2 col-xl-2 col-xxl-2">
                                <div class="login9">
                                    <img src="{{ asset('user-assets') }}/images/pic11.png" class="img-fluid" alt="img">
                                </div>
                            </div>
                            <div class="col-12 col-sm-12 col-md-5 col-lg-5 col-xl-5 col-xxl-5">
                                <div class="login8">
                                    <div class="login6">
                                        <button type="button">Continue With Google</button>
                                    </div>
                                    <div class="login6">
                                        <button type="button">Continue With Apple</button>
                                    </div>
                                    <div class="login6">
                                        <button type="button">Continue With Facebook</button>
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
