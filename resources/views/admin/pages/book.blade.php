@extends('admin.layout.layout')

@section('title', 'Admin | Book')

@section('admin-content')

    <style>
        form.example input[type=text] {
            padding: 10px;
            font-size: 17px;
            border: 1px solid grey;
            float: left;
            width: 80%;
            background: #f1f1f1;
        }

        form.example button {
            float: left;
            width: 20%;
            padding: 10px;
            background: #0c2a42;
            color: white;
            font-size: 17px;
            border: 1px solid grey;
            border-left: none;
            cursor: pointer;
        }

        form.example button:hover {
            background: #16181a;
        }

        form.example::after {
            content: "";
            clear: both;
            display: table;
        }

        .pagination {
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .page-item {
            margin: 0 2px;
        }

        .page-link {
            background-color: #003d70;
            border-color: #003d70;
            color: #ffffff;
            padding: 8px 12px;
            text-decoration: none;
            border-radius: 4px;
        }

        .page-item.active .page-link {
            background-color: #ff0000;
            border-color: #ff0000;
        }

        .page-link.border_non_active:hover {
            background-color: #721111;
        }

        .sidebar .nav .nav-item .nav-link .icon-bg .menu-icon {
            color: #42a9ff;
        }

        .sidebar .nav .nav-item.active>.nav-link:before {
            background-color: #808080;
        }

        .sidebar .nav .nav-item.active>.nav-link .menu-title {
            color: #ff0000;
        }

        .sidebar .nav .nav-item.active>a.icon-bg .menu-icon {
            color: #ff0000;
        }

        @keyframes police-light {
            0% {
                box-shadow: 0 0 20px #f00, 0 0 40px #f00, 0 0 80px #f00;
            }

            50% {
                box-shadow: 0 0 20px rgba(0, 0, 255, 0.603), 0 0 40px rgba(0, 0, 255, 0.568), 0 0 80px rgba(0, 0, 255, 0.466);
            }

            100% {
                box-shadow: 0 0 20px #f00, 0 0 40px #f00, 0 0 80px #f00;
            }
        }

        .dropdownTime.animate-light {
            animation: police-light 2s linear infinite;
        }

        @keyframes snake-move {
            0% {
                transform: translateX(0);
            }

            50% {
                transform: translateX(20%);
            }
        }

        ..animate-snake {
            animation: snake-move 5s linear infinite;
        }
    </style>

    <div class="d-xl-flex justify-content-between align-items-start">
        <h1 class="fw-bold" style="color:#808080;">ROOM</h1>
        <div class="d-flex">
            <button class="btn" style="background-color:#af792d;color:white;" data-toggle="modal" data-target="#addMachine">Add Room</button>
        </div>
    </div>

    <script>
        function updateTime() {
            var currentTime = new Date();
            var seconds = currentTime.getSeconds().toString().padStart(2, '0');
            document.getElementById('current-time').textContent = currentTime.getHours() + ':' + currentTime.getMinutes() +
                ':' + seconds;
        }

        setInterval(updateTime, 1000);
        document.querySelector('.dropdownTime').classList.add('animate-light');
    </script>

    <?php
        if ($customError)
        {
            $errorMessage = implode("\\n", $customError);
            // Display the errors in a single alert
            echo "<script>alert(\"$errorMessage\");</script>";
        }
    ?>
    <div class="row">
        <div class="col-md-12">
            <hr>
            <div class="tab-content tab-transparent-content">
                <div class="tab-pane fade show active" id="business-1" role="tabpanel" aria-labelledby="business-tab">
                    <div class="row">
                        
                        <!--foreach-->
                        {{--<div class="col-xl-3 col-lg-6 col-sm-6 grid-margin stretch-card" >
                                <div class="card" >
                                    <a href="" style="text-decoration:none;">
                                    <div class="card-container">
                                        <div style="background-size: cover; opacity: 0.3; position: absolute; top: 0; left: 0; width: 100%; height: 100%; z-index: 1;"></div>
                                        <div class="card-body text-center">
                                            <h5 class="mb-2 text-dark font-weight-normal py-2" style="text-transform:capitalize;color:black;"><b>name</b></h5>
                                            <div
                                                class="dashboard-progress dashboard-progress-3 d-flex align-items-center justify-content-center item-parent my-5 ">
                                                <!--<i class="fas fa-cog animate-snake icon-md absolute-center text-success"></i>-->
                                            </div>
                                            <h2 class="mb-4 text-dark font-weight-bold  ">@if($machines->id == 1) {{$conveyor ?? '0'}} @elseif($machines->id == 2) {{$dozer  ?? '0'}} @elseif($machines->id == 3) {{$excavator  ?? '0'}} @elseif($machines->id == 4) {{$loader ?? '0'}} @elseif($machines->id == 5) {{$pitAndYard ?? '0'}} @elseif($machines->id == 6) {{$portableCrusher ?? '0'}} @elseif($machines->id == 7) {{$skidStreer ?? '0'}} @elseif($machines->id == 8) {{$carscraepper ?? '0'}} @elseif($machines->id == 9) {{$bulldozer ?? '0'}} @elseif($machines->id == 10) {{$tractor ?? '0'}} @else {{$crain ?? '0'}} @endif</h2>
                                            <!--<h2 class="mb-4 text-dark font-weight-bold"><i class="fa-solid fa-trash fa-fade"></i></h2>-->
                                        </div>
                                    </div>
                                    </a>
                                            <a style="background-color: #f0f1f6;" href="" onclick="return confirm('Are you sure you want to delete this book?')"><i  class="fa fa-trash" style="font-size:18px;color:red;position:absolute;top:135px;left:20px;z-index:1;"></i></a>
                                </div>
                            <!--</div>-->
                        </div>--}}
                        <!--endforeach-->
                        {{--<div class="col-xl-6 col-lg-6 col-sm-6 grid-margin stretch-card">
                            <div class="card">
                                <a href="{{ route('admin.inspections.get') }}" style="text-decoration:none;">
                                    <div class="card-body text-center">
                                        <h5 class="mb-2 text-dark font-weight-normal py-2">Inspection Data</h5>
                                        <div
                                            class="dashboard-progress dashboard-progress-3 d-flex align-items-center justify-content-center item-parent my-5 ">
                                            <i class="mdi mdi-newspaper animate-snake icon-md absolute-center text-info"></i>
                                        </div>
                                        <h2 class="mb-4 text-dark font-weight-bold  ">{{ $data }}</h2>
                                    </div>
                                </a>
                            </div>
                        </div>--}}
                        {{--<div class="col-xl-3 col-lg-6 col-sm-6 grid-margin stretch-card">
                            <div class="card">
                                <a href="" style="text-decoration:none;">
                                    <div class="card-body text-center">
                                        <h5 class="mb-2 text-dark font-weight-normal py-2">Visitors</h5>
                                        <div
                                            class="dashboard-progress dashboard-progress-3 d-flex align-items-center justify-content-center item-parent my-5">
                                            <i
                                                class="mdi mdi-account-question animate-snake icon-md absolute-center text-success"></i>
                                        </div>
                                        <h2 class="mb-4 text-dark font-weight-bold"></h2>
                                    </div>
                                </a>
                            </div>
                        </div>--}}
                        {{--<div class="col-xl-3 col-lg-6 col-sm-6 grid-margin stretch-card">
                            <div class="card">
                                <a href="" style="text-decoration:none;">
                                    <div class="card-body text-center">
                                        <h5 class="mb-2 text-dark font-weight-normal py-2">News</h5>
                                        <div
                                            class="dashboard-progress dashboard-progress-3 d-flex align-items-center justify-content-center item-parent my-5 ">
                                            <i class="mdi mdi-glasses animate-snake icon-md absolute-center"
                                                style="color:rgb(17, 190, 243);"></i>
                                        </div>
                                        <h2 class="mb-4 text-dark font-weight-bold  "></h2>
                                    </div>
                                </a>
                            </div>
                        </div>--}}
                    </div>

                </div>
            </div>
        </div>
    </div>

<!-- Modal add room-->
    <div class="modal fade" id="addMachine" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-dark" id="exampleModalLabel">Add Book</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true" style="margin-right: 9px;margin-top: 1px;position: absolute;right: 6px;top: 15px;">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="sec-form">
                        <form action="{{route('roomPdfAdd')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group mb-3">
                                <label for="title">Room</label>
                                <select name="room_name" class="form-control">
                                    <option value="">Enter Room</option>
                                    <option value="room1">Room 1</option>
                                    <option value="room2">Room 2</option>
                                </select>
                            </div>
                            <div class="form-group mb-3">
                                <!--accept="image/jpeg, image/png, image/jpg, image/gif, image/svg, image/webp"-->
                                <label for="email">Title</label>
                                <input type="text" name="title" class="form-control">
                            </div>
                            <div class="form-group mb-3">
                                <!--accept="image/jpeg, image/png, image/jpg, image/gif, image/svg, image/webp"-->
                                <label for="email">Add PDF</label>
                                <input type="file" name="pdf" class="form-control">
                            </div>
                            <div class="form-group mb-3">
                                <!--accept="image/jpeg, image/png, image/jpg, image/gif, image/svg, image/webp"-->
                                <label for="email">Add Video</label>
                                <input type="file" name="video" class="form-control">
                            </div>
                            <button type="submit" class="btn btn-success">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
<!-- Modal add product-->

@endsection
