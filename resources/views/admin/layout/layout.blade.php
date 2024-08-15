<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    @include('admin.includes.links')
    <style>
        .content-wrapper {
            background-image: url('https://customdemo.website/apps/torah-memory-palace/public/uploads/logo/pic10.png');
        }
    </style>
</head>

<body>

    <div class="container-scroller">

        @include('admin.includes.top-bar')

        <div class="container-fluid page-body-wrapper">

            @include('admin.includes.side-bar')

            <div class="main-panel">

                <div class="content-wrapper">

                    @yield('admin-content')

                    <script src="https://code.jquery.com/jquery-3.7.0.min.js"
                        integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
                    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/css/toastr.css"
                        rel="stylesheet" />
                        <!--<link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">-->
                        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
                    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/js/toastr.js"></script>

                    <script>
                        $(document).ready(function() {
                            toastr.options.timeOut = 10000;
                            @if (Session::has('message'))
                                toastr.success('{{ Session::get('message') }}');
                            @endif
                        });
                    </script>
                    
                    <script>
                        $(document).ready(function () {
                            // console.log(1);
                            $('.editUserBtn').on('click', function () {
                                // alert(1);
                                var userId = $(this).data('userid');
                                // alert(userId);
                                // return false;
                                var userType = $(this).data('type');
                                var userName = $(this).data('name');
                                var userEmail = $(this).data('email');
                                var userPhone = $(this).data('phone');
                                var userPassword = $(this).data('password');
                    
                                // Update modal fields with user data
                                $('#userId').val(userId);
                                $('#editType').val(userType);
                                $('#editName').val(userName);
                                $('#editEmail').val(userEmail);
                                $('#editPhone').val(userPhone);
                                // You may choose not to update the password field for security reasons
                                // $('#editPassword').val(userPassword);
                            });
                        });
                    </script>

                </div>
                {{-- @include('admin.includes.footer') --}}

            </div>

        </div>

    </div>


    @include('admin.includes.scripts')

</body>

</html>
