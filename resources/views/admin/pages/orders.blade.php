@extends('admin.layout.layout')

@section('title', 'Admin | Payments')

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

        table td div,
        table td span,
        table td p {
            line-height: 2;
        }
    </style>

    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="heading d-flex justify-content-between">
                    <h1>Payments</h1>
                    <div class="d-flex">
                        <div class="examplesearch-form mx-3">
                            <div class="examplesearch-form mx-3">
                                <form action="" method="get" class="example"
                                    id="live-search-form">
                                    <input type="text" placeholder="Search.." value="" name="search"
                                        id="search-input" class="form-control">
                                    <button type="submit"><i class="fa fa-search"></i></button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <hr>
        <div class="row my-5">
            <div class="col-lg-12">
                <table class="table table-striped">
                    <thead class="bg-dark text-white">
                        <tr>
                            <th>#id</th>
                            <th>Pay Info</th>
                            <th>Card Info</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($orders as $order)
                            @php
                            @endphp
                            <tr>
                                <td>{{ $order->id }}</td>
                                <td>
                                    <div class="w-100 d-flex flex-column">
                                        <div class="d-flex">
                                            <div class="col-md-3">Package :</div>
                                            <div class="col-md-8">{{ $order->pkg_name }}</div>
                                        </div>
                                        <div class="d-flex">
                                            <div class="col-md-3">Price :</div>
                                            <div class="col-md-8">$ {{ $order->total_price }}</div>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class="w-100 d-flex flex-column">
                                        <div class="d-flex">
                                            <div class="col-md-3">Name :</div>
                                            <div class="col-md-8">{{ $order->card_name }}</div>
                                        </div>
                                        <div class="d-flex">
                                            <div class="col-md-3">Number :</div>
                                            <div class="col-md-8">{{ $order->card_number }}</div>
                                        </div>
                                        <div class="d-flex">
                                            <div class="col-md-3">Date :</div>
                                            <div class="col-md-8">{{ $order->card_date }}</div>
                                        </div>
                                    </div>
                                </td>
                                </td>
                                <td>
                                    @if ($order->status == 1)
                                        <button
                                            style="padding: 5px 15px; background:#2FB02E; color:white; border: none; border-radius: 30px;">Paid</button>
                                    @else
                                        <button
                                            style="padding: 5px 15px; background:#2FB02E; color:white; border: none; border-radius: 30px;">Unpaid</button>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <!-- paginator -->
                <div class="paginate d-flex justify-content-center align-item-center bg-light p-2"
                    style="border-radius:10px;">
                    <div class="text-dark pt-3">
                        {{ $orders->links() }}
                        <div hidden>
                            @if ($orders->lastPage() > 1)
                                <ul class="pagination justify-content-center">
                                    <li class="page-item {{ $orders->currentPage() == 1 ? ' disabled' : '' }}">
                                        <a class="page-link border_none_pagination"
                                            href="{{ $orders->url($orders->currentPage() - 1) }}">Previous</a>
                                    </li>
                                    @for ($i = $orders->currentPage(); $i <= $orders->currentPage() + 5; $i++)
                                        <li class="page-item">
                                            <a class="page-link {{ $orders->currentPage() == $i ? ' border_active' : 'border_non_active' }} border_none2"
                                                href="{{ $orders->url($i) }}">{{ $i }}</a>
                                        </li>
                                    @endfor
                                    <li
                                        class="page-item {{ $orders->currentPage() == $orders->lastPage() ? ' disabled' : '' }}">
                                        <a class="page-link border_none_pagination"
                                            href="{{ $orders->url($orders->currentPage() + 1) }}">Next</a>
                                    </li>
                                </ul>
                            @endif
                        </div>
                    </div>
                </div>
                <!-- End paginator -->
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.3.min.js"
        integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>

    <script>
        $(document).ready(function() {
            // Listen for input changes in the search field

        });
    </script>
    
    
@endsection