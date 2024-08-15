@extends('admin.layout.layout')

@section('title', 'Admin | Queries')


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
            background-color: #721111;
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

        .card:hover {
            animation: 0.3s ease-in-out;
            cursor: pointer;
        }
    </style>

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

    <div class="d-xl-flex justify-content-between align-items-start">
        <h2 class="text-danger font-weight-bold mb-2">Properties</h2>
        <div class="d-sm-flex justify-content-xl-between align-items-center mb-2">
            <div class="dropdownTime ml-0 ml-md-4 mt-2 mt-lg-0" style="box-shadow: 0px 6px 30px rgba(1, 170, 156, 0.521);">
                <button class="btn bg-white p-3 d-flex align-items-center" type="button" id="dropdownMenuButton1">
                    <i class="mdi mdi-calendar mr-1 mx-3 text-success" id="current-date">{{ now()->format('Y-m-d') }}</i>
                    <span id="current-time" class="text-danger fw-bolder">{{ now()->format('H:i:s') }}</span>
                </button>
            </div>

        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <hr>

            <div class="tab-content tab-transparent-content">
                <div class="tab-pane fade show active" id="business-1" role="tabpanel" aria-labelledby="business-tab">
                    <div class="row">
                        @php
                            // Fetch all media data for the properties in one query
                            $propertyIds = $properties->pluck('ListingKeyNumeric')->toArray();
                        @endphp
                        @foreach ($properties as $property)
                            <div class="col-xl-3 col-lg-6 col-sm-6 grid-margin stretch-card">
                                <div class="card p-2">
                                    <a href="" style="text-decoration:none; color: black;">
                                        <div class="">
                                            @if ($property)
                                                <img src="{{ $property->Media_MediaURL }}" alt="findproimg"
                                                    style="width: 100%; height: 250px;">
                                            @else
                                                <img src="{{ asset('user-assets/images/artical1.jpg') }}" alt="findproimg"
                                                    style="width: 100%; height: 250px;">
                                            @endif
                                        </div>
                                        <div class="py-1">
                                            {{ $property->UnparsedAddress ?? 'N/A' }}
                                        </div>
                                        <div class="d-flex align-items-center justify-content-between py-3">
                                            <div>
                                                @if ($property)
                                                    <h4>Luxury Home {{ $property->City }}</h4>
                                                @else
                                                    <h4>Luxury Home N/A</h4>
                                                @endif
                                            </div>
                                            <div>
                                                <h4>$ {{ $property->ListPrice ?? 'N/A' }}</h4>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <!-- pagination  -->
                    <div class="paginate d-flex justify-content-center align-item-center bg-light p-2"
                        style="border-radius:10px;">
                        <div class="text-dark pt-3">
                            {{ $properties->links() }}
                            <!-- paginator -->
                            <div hidden>
                                @if ($properties->lastPage() > 1)
                                    <ul class="pagination justify-content-center">
                                        <li class="page-item {{ $properties->currentPage() == 1 ? ' disabled' : '' }}">
                                            <a class="page-link border_none_pagination"
                                                href="{{ $properties->url($properties->currentPage() - 1) }}">Previous</a>
                                        </li>
                                        @for ($i = $properties->currentPage(); $i <= $properties->currentPage() + 8; $i++)
                                            <li class="page-item">
                                                <a style="background-color:#003d70; border-color: #003d70;"
                                                    class="page-link {{ $properties->currentPage() == $i ? ' border_active' : 'border_non_active' }} border_none2"
                                                    href="{{ $properties->url($i) }}">{{ $i }}</a>
                                            </li>
                                        @endfor
                                        <li
                                            class="page-item {{ $properties->currentPage() == $properties->lastPage() ? ' disabled' : '' }}">
                                            <a class="page-link border_none_pagination"
                                                href="{{ $properties->url($properties->currentPage() + 1) }}">Next</a>
                                        </li>
                                    </ul>
                                @endif
                            </div>
                            <!-- End paginator -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



@endsection
