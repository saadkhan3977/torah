<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin | Forgot Password</title>
    @include('admin.includes.links')


    <style>
        body {
            width: 100%;
            height: 100%;
            background: linear-gradient(45deg, rgba(1, 41, 43, 0.671), rgba(12, 66, 64, 0.712));
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
                toastr.success('{{ Session::get('message') }}');
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
    <div class="container">
        <div class="row d-flex justify-content-center my-5 py-5">
            <div class="col-lg-6">
                <h3 class="text-dark text-center mb-3">Forgot Password</h3>
                <hr class="bg-info">
                <div class="sec-form pt-3 p-3"
                    style="border-radius: 20px; background: rgba(255, 255, 255, 0.658); box-shadow: 5px 5px 10px grey;">
                    <form action="{{ route('admin.forgot.post') }}" method="post">
                        @csrf
                        <div class="form-group mb-3">
                            <input type="email" name="email" class="form-control" placeholder="Enter email..."
                                style="border-radius: 20px;">
                            @error('email')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="forgot">
                            <a href="{{ route('admin_login_page') }}" class="text-dark">Login ?</a>
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn w-25 my-4 text-dark bg-info">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    @include('admin.includes.scripts')
</body>

</html>
