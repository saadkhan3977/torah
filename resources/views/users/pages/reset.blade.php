@extends('users.layouts.layout')

@section('title', 'Memory Palace | Reset Password')

@section('main-content')

    <section class="about1">
        <div class="container">
            <div class="row">
                <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12">
                    <div class="about2">
                        <h2>Reset Password</h2>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="reg1">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-sm-12 col-md-5 col-lg-5 col-xl-5 col-xxl-5">
                    <div class="reg2">
                        <form action="{{ route('reset.post') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3 reg4">
                                <input type="hidden" name="token" value="{{ $token }}" class="form-control"
                                    placeholder="Enter Your Email ">
                                <label for="exampleInputEmail1" class="form-label">Email address *</label>
                                <input type="email" name="email" class="form-control" placeholder="Enter Your Email ">
                            </div>
                            <div class="mb-3 reg4">
                                <label for="exampleInputPassword1" class="form-label">Password *</label>
                                <input type="password" name="password" class="form-control"
                                    placeholder="Enter Your Password">
                            </div>
                            <div class="mb-3 reg4">
                                <label for="exampleInputPassword2" class="form-label">Confirm Password *</label>
                                <input type="password" name="cpassword" class="form-control" placeholder="Confirm Password">
                            </div>
                            <div class="reg3">
                                <button type="submit">Submit</button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </section>

    <div>
        <a id="button" class="my-button show"></a>
    </div>

@endsection
