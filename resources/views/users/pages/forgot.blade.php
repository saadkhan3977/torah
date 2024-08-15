@extends('users.layouts.layout')

@section('title', 'Memory Palace | Forgot Password')

@section('main-content')


<section class="about1">
    <div class="container">
        <div class="row">
            <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12">
                <div class="about2">
                    <h2>Forgot Password</h2>
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
                    <form action="{{ route('forgot.post') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3 reg4">
                            <label for="exampleInputname" class="form-label">Username or email address *</label>
                            <input type="email" name="email" class="form-control" placeholder="Enter Your Email ">
                        </div>
                        <div class="login5">
                            <div class="login4">
                            </div>
                            <div class="login4">
                                <a href="{{route('login.get')}}">login ?</a>
                            </div>
                        </div>
                        <div class="reg3">
                            {{-- <a href="reset.php">Submit</a> --}}
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
