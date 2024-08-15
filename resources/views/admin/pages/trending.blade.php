
@extends('admin.layout.layout')

@section('title', 'Admin | Trending')


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

        .sidebar .nav .nav-item .nav-link .icon-bg .menu-icon{
            color: #42a9ff;
        }

        .sidebar .nav .nav-item.active > .nav-link:before{
            background-color: #808080;
        }

        .sidebar .nav .nav-item.active > .nav-link .menu-title{
            color: #ff0000;
        }
        .sidebar .nav .nav-item.active > a.icon-bg .menu-icon{
            color: #ff0000;
        }
    </style>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script>
        function my(course){
            // alert(course);
            if(course == "Select Course...")
            {
                // alert('null');
                document.getElementById('room').disabled = true;
                document.getElementById('room_submit').hidden = true;
            }
            else
            {
                document.getElementById('room').disabled = false;
            }
        };
        
        function myroom(room){
            if(room == "Select Room...")
            {
                // alert('null');
                document.getElementById('room_submit').hidden = true;
            }
            else
            {
                document.getElementById('room_submit').hidden = false;
            }
            
        }
        $(document).on("click","#cust_btn",function(){
            // alert(1);
            $("#myModal").modal("toggle");
        
        });
    </script>
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="heading d-flex justify-content-between">
                    <h1 class="fw-bold" style="color:#808080;">Trending Section</h1>

                    {{--<div class="d-flex">
                    <button class="btn" style="background-color:#af792d;color:white;" data-toggle="modal" data-target="#addProduct">Add User</button>
                    </div>--}}
                </div>
            </div>
        </div>
        <hr>
        <div class="sec-form">
            <form action="" method="get" >
                <div class="form-group mb-3" style="display:inline-block;width:48%;">
                    <label for="type">Select Course</label>
                    <select name="course_type" class="form-control" onchange="my(this.value)" required>
                        <option>Select Course...</option>
                        @foreach($course as $courses)
                        <option value="{{$courses->id}}">{{$courses->value}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group mb-3" style="display:inline-block;width:49%;margin-left:20px;">
                    <label for="type">Select Room</label>
                    <select name="room_type" class="form-control" disabled id="room" onchange="myroom(this.value)" required>
                        <option>Select Room...</option>
                        @foreach($room as $rooms)
                        <option value="{{$rooms->id}}">{{$rooms->value}}</option>
                        @endforeach
                    </select>
                </div>
                <button type="submit" class="btn btn-success" id="room_submit" hidden>Submit</button>
            </form>
        </div>
        <div class="row my-5 fullInfo">
            <div class="col-lg-12">
                <?php 
                    $daf = $daf ?? ""
                ?>
                @if($daf)
                <table class="table table-striped">
                    <thead class="text-white" style="background:#af792d;">
                        <th>#id</th>
                        <th>Label</th>
                        <th>PDf</th>
                        <th>Video</th>
                        <th></th>
                    </thead>
                    <tbody class="border">
                        @php
                            $i=1;
                        @endphp
                    
                        @foreach ($daf as $item)
                            
                            <tr>
                            <!--background-color: #fc5a5a;-->
                                <td>{{ $i++ }}</td>
                                <td>{{$item->label}}</td>
                                {{--<td>{{$item->pdf}} <span style="float:right;"></span></td>--}}
                                <td><a href="{{asset('uploads/pdf/').'/'.$item->pdf}}" target="_blank" style="color:black;">{{$item->pdf}}</a></td>
                                {{--<td><a href="{{asset('uploads/video/').'/'.$item->video}}" style="color:black;">{{$item->video}}</a></td>--}}
                                <td>
                                    <button type="button" style="border: none;background-color: transparent;" id="cust_btn" data-toggle="modal" data-target="#myModal" data-userid="{{ $item->id }}" data-video="{{asset('uploads/video/') . '/' . $item->video }}">
                                        {{$item->video}}
                                    </button>
                                </td>
                                <?php 
                                    $jj = App\Models\Trending::where('daf_id',$item->id)->first();
                                    // dd($jj->daf_id);
                                ?>
                                
                                @if($jj && ($jj->daf_id == $item->id))
                                <td>
                                    <button style="background-color:#c4e3f7;border-color: #af792d;width:70%" class="btn btn-danger" >
                                        <a style="color:#af792d;background-color:#c4e3f7;" href="{{ route('admin.trending.del', ['id' => $item->id] ) }}">
                                            <i class="fa fa-star"></i>
                                            <span style="font-size:13px;">Trending</span>
                                        </a>
                                    </button>
                                </td>
                                @else
                                <td>
                                    <button style="background-color:#c4e3f7;border-color: #af792d;width:70%" class="btn btn-danger" >
                                        <a style="color:#af792d;background-color:#c4e3f7;" href="{{ route('admin.trending.post', ['id' => $item->id] ) }}" onclick="return confirm('Are You Sure You Want To Trending This {{ $item->label }}')">
                                            <i class="fa fa-star"></i>
                                            <span style="font-size:13px;">Not Trending</span>
                                        </a>
                                    </button>
                                </td>
                                @endif
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                @endif
                {{--<div class="paginate d-flex justify-content-center align-item-center p-2" style="background-color:#808080;">
                    <div class="text-dark pt-3">
                        {{ $users->links() }}
                        <div hidden>
                            @if ($users->lastPage() > 1)
                                <ul class="pagination justify-content-center">
                                    <li class="page-item {{ $users->currentPage() == 1 ? ' disabled' : '' }}">
                                        <a class="page-link border_none_pagination"
                                            href="{{ $users->url($users->currentPage() - 1) }}">Previous</a>
                                    </li>
                                    @for ($i = $users->currentPage(); $i <= $users->currentPage() + 8; $i++)
                                        <li class="page-item">
                                            <a class="page-link {{ $users->currentPage() == $i ? ' border_active' : 'border_non_active' }} border_none2"
                                                href="{{ $users->url($i) }}">{{ $i }}</a>
                                        </li>
                                    @endfor
                                    <li
                                        class="page-item {{ $users->currentPage() == $users->lastPage() ? ' disabled' : '' }}">
                                        <a class="page-link border_none_pagination"
                                            href="{{ $users->url($users->currentPage() + 1) }}">Next</a>
                                    </li>
                                </ul>
                            @endif
                        </div>
                    </div>
                </div>--}}
            </div>
        </div>
    </div>

<!--Video Modal-->
<div class="container">
    <div class="modal fade" id="myModal" role="dialog">
        <div class="modal-dialog">
        
          <!-- Modal content-->
          <div class="modal-content">
            <!--<div class="modal-header">-->
            <!--  <button type="button" class="close" data-dismiss="modal">&times;</button>-->
            <!--  <h4 class="modal-title">Modal Header</h4>-->
            <!--</div>-->
            <div class="modal-body">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <p style="color:black;">{{ $item->video ?? "" }}</p>
                <?php
                    $items = isset($item->video) ? $item->video : "";
                ?>
                @if($items != "")
                    <video src="{{asset('uploads/video/').'/'.$items}}" width="100%" controls="" preload="" muted="" autoplay="" loop="" type="video/mp4">
                @endif
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-success" data-dismiss="modal">Close</button>
            </div>
          </div>
          
        </div>
    </div>
</div>
<!--Video Modal-->

<!-- Modal add user-->
    <div class="modal fade" id="addProduct" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-dark" id="exampleModalLabel">Add User</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true" style="margin-right: 9px;margin-top: 1px;position: absolute;right: 6px;top: 15px;">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="sec-form">
                        {{--enctype="multipart/form-data"--}}
                        <form action="{{route('adminUsers_register')}}" method="post" >
                            @csrf
                            <div class="form-group mb-3">
                                <label for="type">Type</label>
                                <select name="type" class="form-control">
                                    <option>Select Type...</option>
                                    <option value="admin">Admin</option>
                                    <option value="user">User</option>
                                </select>
                            </div>
                            <div class="form-group mb-3">
                                <label for="title">Name</label>
                                <input type="text" name="name" class="form-control"
                                    placeholder="Enter Name...">
                            </div>
                            <div class="form-group mb-3">
                                <label for="email">Email</label>
                                <input type="email" name="email" class="form-control"
                                    placeholder="Enter Email ...">
                            </div>
                            {{--<div class="form-group mb-3">
                                <label for="phone">Phone</label>
                                <input type="tel" name="phone" class="form-control"
                                    placeholder="Enter Phone...">
                            </div>--}}
                            <div class="form-group mb-3">
                                <label for="password">Password</label>
                                <input type="password" name="password" class="form-control"
                                    placeholder="Enter Password...">
                            </div>
                            {{--<div class="form-group mb-3">
                                <label for="password">Confirm Password</label>
                                <input type="password" name="cpassword" class="form-control"
                                    placeholder="Enter Password...">
                            </div>--}}
                            <!--<div class="form-group mb-3">-->
                            <!--    <div class="form-group">-->
                            <!--        <label><strong>Description :</strong></label>-->
                            <!--        <textarea class="ckeditor form-control" name="pro_description"></textarea>-->
                            <!--    </div>-->
                            <!--</div>-->
                            <button type="submit" class="btn btn-success">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
<!-- Modal add user-->
    
<!-- Modal edit user-->
    <div class="modal fade" id="editUser" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-dark" id="exampleModalLabel">Edit User</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true" style="margin-right: 9px;margin-top: 1px;position: absolute;right: 6px;top: 15px;">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="sec-form">
                        <form id="editUserForm" action="{{ route('adminUsers_edit') }}" method="post">
                            @csrf
                            <input type="hidden" name="userId" id="userId" value="">
                            <div class="form-group mb-3">
                                <label for="type">Type</label>
                                <select name="type" id="editType" class="form-control">
                                    <option>Select Type...</option>
                                    <option value="admin">Admin</option>
                                    <option value="user">User</option>
                                </select>
                            </div>
                            <div class="form-group mb-3">
                                <label for="title">Name</label>
                                <input type="text" name="name" id="editName" class="form-control" placeholder="Enter Name...">
                            </div>
                            <div class="form-group mb-3">
                                <label for="email">Email</label>
                                <input type="email" name="email" id="editEmail" class="form-control" placeholder="Enter Email ...">
                            </div>
                            {{--<div class="form-group mb-3">
                                <label for="phone">Phone</label>
                                <input type="tel" name="phone" id="editPhone" class="form-control" placeholder="Enter Phone...">
                            </div
                            <div class="form-group mb-3">
                                <label for="password">Password</label>
                                <input type="password" name="password" id="editPassword" class="form-control" placeholder="Enter Password...">
                            </div>>--}}
                            <button type="submit" class="btn btn-success">Submit</button>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
<!-- Modal edit product-->
    



    <script src="//cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('.ckeditor').ckeditor();
        });
    </script>
<script src="https://code.jquery.com/jquery-3.6.3.min.js"
        integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>

@endsection
