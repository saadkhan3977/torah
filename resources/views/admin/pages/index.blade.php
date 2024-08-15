@extends('admin.layout.layout')

@section('title', 'Admin | Dashboard')

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

        /*.dropdownTime.animate-light {*/
        /*    animation: police-light 2s linear infinite;*/
        /*}*/

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
        <h1 class="fw-bold" style="color:#808080;">Overview Dashboard</h1>
        <div class="d-sm-flex justify-content-xl-between align-items-center mb-2">
            <div class="dropdownTime ml-0 ml-md-4 mt-2 mt-lg-0" style="box-shadow: 0px 6px 30px rgba(236, 210, 146, 1);">
                <button class="btn bg-white p-3 d-flex align-items-center" type="button" id="dropdownMenuButton1">
                    <i class="mdi mdi-calendar mr-1 mx-3 text-success" id="current-date">{{ now()->format('m-d-Y') }}</i>
                    <span id="current-time" class="text-danger fw-bolder">{{ now()->format('H:i:s') }}</span>
                </button>
            </div>

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

   @php
    $users = App\Models\User::where('status',1)->count();
   @endphp

    <div class="row">
        <div class="col-md-12">
            <hr>
            <div class="tab-content tab-transparent-content">
                <div class="tab-pane fade show active" id="business-1" role="tabpanel" aria-labelledby="business-tab">
                    <div class="row">
                        <div class="col-xl-6 col-lg-6 col-sm-6 grid-margin stretch-card">
                            <div class="card">
                                <a href="" style="text-decoration:none;">
                                    <div class="card-body text-center">
                                        <h5 class="mb-2 text-dark font-weight-normal py-2">Users</h5>
                                        <div
                                            class="dashboard-progress dashboard-progress-3 d-flex align-items-center justify-content-center item-parent my-5 ">
                                            <i
                                                class="mdi mdi-account-multiple animate-snake icon-md absolute-center text-success"></i>
                                        </div>
                                        <h2 class="mb-4 text-dark font-weight-bold  ">{{$users}}</h2>
                                    </div>
                                </a>
                            </div>
                        </div>
                        {{--<div class="col-xl-6 col-lg-6 col-sm-6 grid-margin stretch-card">
                            <div class="card">
                                <a href="" style="text-decoration:none;">
                                    <div class="card-body text-center">
                                        <h5 class="mb-2 text-dark font-weight-normal py-2">Inspection Data</h5>
                                        <div
                                            class="dashboard-progress dashboard-progress-3 d-flex align-items-center justify-content-center item-parent my-5 ">
                                            <i class="mdi mdi-newspaper animate-snake icon-md absolute-center text-info"></i>
                                        </div>
                                        <h2 class="mb-4 text-dark font-weight-bold  "></h2>
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

@endsection
