<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin | Login</title>
    @include('admin.includes.links')

    <style>
        body {
            width: 100%;
            height: 100%;
            background: linear-gradient(45deg, rgba(253, 234, 174, 1), rgba(175, 121, 45, 1));
            background-color: #fff;
        }
    </style>


</head>


<body>
    <script src="https://code.jquery.com/jquery-3.7.0.min.js"
        integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/css/toastr.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/js/toastr.js"></script>

    <script>
        $(document).ready(function() {
            toastr.options.timeOut = 10000;

            @if (Session::has('message'))
                toastr.message('{{ Session::get('message') }}');
            @endif

            @if (Session::has('info'))
                toastr.info('{{ Session::get('info') }}');
            @endif

            @if (Session::has('warning'))
                toastr.warning('{{ Session::get('warning') }}');
            @endif

            @if (Session::has('error'))
                toastr.error('{{ Session::get('error') }}');
            @endif
        });
    </script>
    <div class="container-fluid bgImg">
        <div class="container">
            <div class="row d-flex justify-content-center my-5 py-5">
                <div class="col-lg-6">
                    <h3 class="text-dark text-center mb-3 " style="font-size: 32px; font-weight: bold;">Admin Login</h3>
                    <hr style="background-color:#221602;">
                    <div class="sec-form pt-3 p-3"
                        style="border-radius: 20px; background: rgba(255, 255, 255, 0.658); box-shadow: 5px 5px 10px grey;">
                        <form action="{{ route('login.post') }}" method="post">
                            @csrf
                            <div class="form-group mb-3">
                                <input type="email" name="email" class="form-control" placeholder="Enter email..."
                                    style="border-radius: 20px;">
                                @error('email')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group mb-3">
                                <input type="password" name="password" class="form-control"
                                    placeholder="Enter password..." style="border-radius: 20px;">
                                @error('password')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="forgot">
                                <a href="{{ route('admin.forgot.get') }}" class="text-dark">Forgot password
                                    ?</a>
                            </div>
                            <div class="text-center">
                                <button type="submit" style="background-color:#221602;margin-left:37%;"
                                    class="btn w-25 my-4 text-white">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('admin.includes.scripts')
</body>

</html>
