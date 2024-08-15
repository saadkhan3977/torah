<?php
use Carbon\Carbon;
// use URL;
?>
<?php
isset($_GET["search"])?$_GET["search"]:'';
?>
@extends('admin.layout.layout')

@section('title', 'Admin | Inspections')

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
        
        .print{
            position: absolute;
            left: 80%;
            top: 14px;
            font-size:13px;
            width:60px;
            height:30px;
            background-color:#008000;
            color:white;
            border: 2px solid #008000;
            border-radius: 5px;
            font-weight:800;
        }
    </style>
    
    @php
        //dd($data);
    @endphp

    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="heading d-flex justify-content-between">
                    <h1 class="fw-bold" style="color:#808080;">Inspections Data</h1>
                    <div class="d-flex">
                        <div class="examplesearch-form mx-3">
                            <?php
                                $get_name = request()->segment(3);
                            ?>
                            <form action="{{route('admin.inspections.get',$get_name)}}" method="get" class="example">
                                <input type="text" placeholder="Search.." value="" name="search"
                                    class="form-control">
                                <button type="submit" class="text-white" style="background:#008000;"><i
                                        class="fa fa-search"></i></button>
                            </form>
                        </div>
                        {{--<button class="btn text-white" style="background:#003d70;" id="preInfo">Add Info</button>--}}
                    </div>
                </div>
            </div>
        </div>
        <hr>
        <div class="row my-5 fullInfo">
            <div class="col-lg-12">
                <table class="table table-striped">
                    <thead class="text-white" style="background:#008000;">
                        <th>#ID</th>
                        <th scope="col" class="text-white">User Info</th>
                        <th>Equipments</th>
                        <th>Operator/Inspector</th>
                        <th style="width:10px;">Date - Time</th>
                        <th>Hours - Unit ID</th>
                        <!--<th>Unit ID</th>-->
                        <th>Completed</th>
                        <th></th>
                    </thead>
                    <tbody class="border">
                        @php
                            $i=1;
                        @endphp
                        @if ($data->count() == 0)
                            <tr>
                                <td colspan="number_of_columns">No Records Found.</td>
                            </tr>
                        @else
                        @foreach ($data as $item)
                            <tr class="">
                                {{--<td>{{ $i++ }}</td>--}}
                                <td><u><b>{{ $item->id }}</b></u></td>
                                @php
                                    //dump($item);
                                    $user = DB::table('users')
                                        ->where('id', $item->user_id)
                                        ->first();
                                @endphp
                                <td>
                                    {{--<p>User Type: <span style="text-transform:capitalize;">{{ $user->type ?? 'N/A' }}</span></p>--}}
                                    <p>Name: <span>{{ $user->name ?? 'N/A' }}</span></p>
                                    <p>Email: <span>{{ $user->email ?? 'N/A' }}</span></p>
                                    <p>Phone: <span>{{ $user->phone ?? 'N/A' }}</span></p>
                                </td>
                                <td style="text-transform:capitalize;">{{ $item->machine_name }}</td>
                                <td style="text-transform:capitalize;">{{ $item->operator_inspector }}</td>
                                <td style="width:10px;">
                                    @php
                                    
                                    $inputDate = $item->date;
                                    $carbonDate = Carbon::parse($inputDate);
                                    $formattedDate = $carbonDate->format('m-d-Y');
                                    $time_extracted = $carbonDate->format('H:i:s');
                                    @endphp
                                    <p>Date: <span>{{ $formattedDate }}</span></p>
                                    <p>Time: <span>{{ $time_extracted }}</span></p>
                                </td>
                                <td>
                                    <p>Hour: <span>{{ $item->machine_hours }}</span></p>
                                    <p>Unit ID: <span>{{ $item->unit_id }}</span></p>
                                </td>
                                @if($item->is_completed == 'true')
                                    <td>Completed</td>
                                @else
                                    <td>Pending</td>
                                @endif
                                
                                {{--<td>
                                    <div style="width: 110px; height: 110px;">
                                        <img src="{{ asset('assets/uploads/inspect'.$item->image) }}" alt="" style="width: 110px; height: 110px;">
                                    </div>
                                </td>
                                <td>
                                    <div style="">
                                        <audio controls>
                                            <source src="{{ asset('assets/uploads/inspect/' . $item->audio) }}" type="audio/mpeg">
                                            Your browser does not support the audio element.
                                        </audio>
                                    </div>
                                </td>
                                <td>
                                    <div style="width: 200px; height: auto;">
                                        <video width="100%" height="100%" controls>
                                            <source src="{{ asset('assets/uploads/inspect/' . $item->video) }}" type="video/mp4">
                                            Your browser does not support the video element.
                                        </video>
                                    </div>
                                </td>--}}
                                <td>
                                    <button class="badge badge-warning text-dark moreId" data-toggle="modal" data-target="#myModal{{ $item->id }}">More</button>
                                </td>
                                
                            </tr>
                        @endforeach
                        @endif
                        @foreach ($data as $item)
                            <!-- Modal for item with specific ID -->
                            <div class="modal fade" id="myModal{{ $item->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel{{ $item->id }}" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="myModalLabel{{ $item->id ?? n/A}}">More Information</h5>
                                            <button class="print" type="submit" onclick="printDocument('{{ $item->id }}')">Print</button>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true" style="margin-right: 9px;margin-top: 1px;position: absolute;right: 6px;top: 15px;">&times;</span>
                                            </button>
                                        </div>
                                        @php
                                        $insp_record = App\Models\inspection_record::where('inspection_info_id',$item->id)->get();
                                        @endphp
                                        @foreach($insp_record as $insp_records)
                                        <div class="modal-body">
                                                <h6 style="color: #686464;"><span class"text-dark fw-bold" style="color:#050532;">Q No: </span>{{$insp_records->qno_id}} </h6>
                                                <h6 style="color: #686464;"><span class"text-dark fw-bold" style="color:#050532;">What Inspecting: </span>{{$insp_records->what_inspecting ?? '-'}} </h6>
                                                <h6 style="color: #686464;"><span class"text-dark fw-bold" style="color:#050532;">What Looking: </span>{{$insp_records->what_looking ?? '-'}} </h6>
                                                <h6 style="color: #686464;"><span class"text-dark fw-bold" style="color:#050532;">Answer: </span>{{$insp_records->answer ?? '-'}} </h6>
                                                <h6 style="color: #686464;"><span class"text-dark fw-bold" style="color:#050532;">Evaluator comments: </span>{{$insp_records->evaluator_comments ?? '-'}}</h6>
                                                @if($insp_records->image)
                                                    <!--style="width: 110px; height: 110px;"-->
                                                    <h6 style="color: #686464;"><span class"text-dark fw-bold" style="color:#050532;">Image: </span><img src="{{ asset('assets/uploads/inspect/'.$insp_records->image) }}" style="vertical-align: middle;padding-top:20px;padding-bottom:25px;width: 180px; height: 210px;display:block;border-radius:50%" alt="" ></h6>
                                                @else
                                                    <h6 style="color: #686464;"><span class"text-dark fw-bold" style="color:#050532;">Image: </span>- </h6>
                                                @endif
                                                
                                                @if($insp_records->audio)
                                                    <!--style="width: 110px; height: 110px;"-->
                                                    <h6 style="color: #686464;"><span class="text-dark fw-bold" style="color:#050532;">Audio: </span><audio controls style="vertical-align: middle;border-style: none;display:block;width:200px;"><source src="{{ asset('assets/uploads/inspect/' . $insp_records->audio) }}" type="audio/mpeg"><source src="{{ asset('assets/uploads/inspect/' . $insp_records->audio) }}" type="audio/m4a"></audio></h6>
                                                @else
                                                    <h6 style="color: #686464;"><span class="text-dark fw-bold" style="color:#050532;">Audio: </span>- </h6>
                                                @endif
                                                
                                                @if($insp_records->video)
                                                    <!--style="width: 110px; height: 110px;"-->
                                                    <h6 style="color: #686464;"><span class"text-dark fw-bold" style="color:#050532;">Video: </span><video controls style="vertical-align: middle;border-style: none;display:block;border-radius:20px;padding-top:20px;" width="400px" height="200px"> <source src="{{ asset('assets/uploads/inspect/' . $insp_records->video) }}" type="audio/mpeg"></video></h6>
                                                @else
                                                    <h6 style="color: #686464;"><span class"text-dark fw-bold" style="color:#050532;">Video: </span>- </h6>
                                                @endif
                                                
                                                @if($insp_records->conclusion_message || $insp_records->conclusion_video || $insp_records->conclusion_audio || $insp_records->conclusion_image)
                                                <h6 style="color: #686464;"><span class"text-dark fw-bold" style="color:#050532;">Conclusion Message: </span>{{$insp_records->conclusion_message ?? 'N/A'}}</h6>
                                                <h6 style="color: #686464;"><span class"text-dark fw-bold" style="color:#050532;">Conclusion Audio: </span>{{$insp_records->conclusion_audio ?? 'N/A'}} </h6>
                                                <h6 style="color: #686464;"><span class"text-dark fw-bold" style="color:#050532;">Conclusion Image: </span>{{$insp_records->conclusion_image ?? 'N/A'}}</h6>
                                                <h6 style="color: #686464;"><span class"text-dark fw-bold" style="color:#050532;">Conclusion Video: </span>{{$insp_records->conclusion_video ?? 'N/A'}} </h6>
                                                @endif
                                                
                                               <hr>  
                                        </div>
                                       
                                        @endforeach
                                        
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach

                    </tbody>
                </table>
                <div class="paginate d-flex justify-content-center align-item-center p-2" style="background-color:#808080;">
                    <div class="text-dark pt-3">
                        {{ $data->appends(['search' => $search])->links() }}
                        <div hidden>
                            @if ($data->lastPage() > 1)
                                <ul class="pagination justify-content-center">
                                    <li class="page-item {{ $data->currentPage() == 1 ? ' disabled' : '' }}">
                                        <a class="page-link border_none_pagination"
                                            href="{{ $data->url($data->currentPage() - 1) }}">Previous</a>
                                    </li>
                                    @for ($i = $data->currentPage(); $i <= $data->currentPage() + 8; $i++)
                                        <li class="page-item">
                                            <a class="page-link {{ $data->currentPage() == $i ? ' border_active' : 'border_non_active' }} border_none2"
                                                href="{{ $data->url($i) }}">{{ $i }}</a>
                                        </li>
                                    @endfor
                                    <li
                                        class="page-item {{ $data->currentPage() == $data->lastPage() ? ' disabled' : '' }}">
                                        <a class="page-link border_none_pagination"
                                            href="{{ $data->url($data->currentPage() + 1) }}">Next</a>
                                    </li>
                                </ul>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

        <script src="https://code.jquery.com/jquery-3.7.0.min.js"
            integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
        <script src="//cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>
        <script type="text/javascript">
            $(document).ready(function() {
                $('.ckeditor').ckeditor();
            });
        </script>



        <script type="text/javascript">
            $(document).ready(function() {

                $('.infoPre').hide();
                $('.more').hide();
                $('#preInfo').click(function() {
                    $('.fullInfo').toggle();
                    $('.infoPre').toggle();
                });

                $('#More').click(function() {
                    $('.more').toggle();
                });
            });
        </script>
        
        <!-- resources/views/main.blade.php -->
        <!--<button onclick="printDocument()">Print</button>-->
        <script>
            function printDocument(modalId) {
                var ID = modalId;
                var printWindow = window.open('{{ url('/admin/print') }}/' + ID, '_blank');
                // alert(printWindow);
        
                // Wait for the window to finish loading before printing
                printWindow.onload = function () {
                    printWindow.print();
                    
                    //  setTimeout(function () {
                    //     printWindow.close();
                        
                    //     // Open another window after closing the print window
                    //     var newWindow = window.open('{{ url('/admin/dashboard') }}', '_blank');
                    // }, 2000);
                };
            }
        </script>



    @endsection
