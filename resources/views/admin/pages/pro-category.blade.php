@extends('admin.layout.layout')

@section('title', 'Admin | Categories')


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


        .dropdown-menu {
            position: relative;
        }

        .sub-men {
            position: absolute;
            right: -40px;
            z-index: 1000;
            overflow-y: auto;
            background: #e5dede;
        }

        .dropdown:hover .dropdown-menu {
            display: block;
            position: absolute;
            margin-left: 100px;
        }
    </style>

    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="heading d-flex justify-content-between">
                    <h1>Categories</h1>
                    <div class="d-flex">
                        <div class="examplesearch-form mx-3">
                            <form action="" method="" class="example">
                                <input type="text" placeholder="Search.." value="" name="search"
                                    class="form-control">
                                <button type="submit"><i class="fa fa-search"></i></button>
                            </form>
                        </div>
                        <button class="btn btn-dark" data-toggle="modal" data-target="#addCategory">Add Category</button>
                    </div>
                </div>
            </div>
        </div>
        <hr>
        <div class="row my-5">
            <div class="col-lg-12">
                <table class="table table-striped">
                    <thead class="bg-dark text-white text-center">
                        <th>#id</th>
                        <th>Main Category</th>
                        <th>Action</th>
                    </thead>
                    <tbody class="border text-center">
                        @foreach ($categories as $category)
                            <tr>
                                <td>{{ $category->id }}</td>
                                <td>{{ $category->category_name }}</td>
                                <td>
                                    <a href="">
                                        <i class="update fa fa-pencil text-dark"
                                            style="font-size:22px; cursor: pointer;"></i>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>

                </table>
                <!-- paginator -->
                <div class="paginate d-flex justify-content-center align-item-center bg-light p-2"
                    style="border-radius:10px;">
                    <div class="text-dark pt-3">
                        {{ $categories->links() }}
                        <div hidden>
                            @if ($categories->lastPage() > 1)
                                <ul class="pagination justify-content-center">
                                    <li class="page-item {{ $categories->currentPage() == 1 ? ' disabled' : '' }}">
                                        <a class="page-link border_none_pagination"
                                            href="{{ $categories->url($categories->currentPage() - 1) }}">Previous</a>
                                    </li>
                                    @for ($i = $categories->currentPage(); $i <= $categories->currentPage() + 5; $i++)
                                        <li class="page-item">
                                            <a class="page-link {{ $categories->currentPage() == $i ? ' border_active' : 'border_non_active' }} border_none2"
                                                href="{{ $categories->url($i) }}">{{ $i }}</a>
                                        </li>
                                    @endfor
                                    <li
                                        class="page-item {{ $categories->currentPage() == $categories->lastPage() ? ' disabled' : '' }}">
                                        <a class="page-link border_none_pagination"
                                            href="{{ $categories->url($categories->currentPage() + 1) }}">Next</a>
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


    <!-- Modal -->
    <div class="modal fade" id="addCategory" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-dark" id="exampleModalLabel">Category </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="sec-form">
                        <form action="{{ route('admin.category.post') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group mb-3">
                                <input type="text" name="category_name" class="form-control"
                                    placeholder="Enter category name...">
                            </div>

                            <button type="submit" class="btn btn-success">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <link type="text/css" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/south-street/jquery-ui.css"
        rel="stylesheet">
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
    <script type="text/javascript" src="http://keith-wood.name/js/jquery.signature.js"></script>

    <link rel="stylesheet" type="text/css" href="http://keith-wood.name/css/jquery.signature.css">

    {{-- <style>
        .kbw-signature {
            width: 100%;
            height: 200px;
        }

        #sig canvas {
            width: 100% !important;
            height: auto;
        }
    </style>
    <div class="container">
        <div class="row">
            <div class="col-md-6 offset-md-3 mt-5">
                <div class="card">
                    <div class="card-header">
                        <h5>Laravel Signature Pad Tutorial Example - ItSolutionStuff.com </h5>
                    </div>
                    <div class="card-body">
                        @if ($message = Session::get('success'))
                            <div class="alert alert-success  alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert">×</button>
                                <strong>{{ $message }}</strong>
                            </div>
                        @endif

                        <form method="POST" action="\" enctype="multipart/form-data">
                            @csrf
                            <div class="col-md-12">
                                <label class="" for="">Signature:</label>
                                <br />
                                <div id="sig"></div>
                                <br />
                                <button id="clear" class="btn btn-danger btn-sm">Clear Signature</button>
                                <textarea id="signature64" name="signature" style="display: none"></textarea>
                            </div>
                            <br />
                            <button class="btn btn-success">Save</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="form-group">
            <label><strong>Description :</strong></label>
            <textarea class="ckeditor form-control" name="img_editor" id="img_editor"></textarea>
        </div>
        <input type="file" id="imageInput" accept="image/*">
        <button id="insertImageButton">Insert Image</button>
    </div>
    <script src="//cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            CKEDITOR.replace('img_editor');
        });

        document.getElementById('insertImageButton').addEventListener('click', function() {
            const input = document.getElementById('imageInput');
            const editor = CKEDITOR.instances.img_editor;

            // Check if a file has been selected
            if (input.files && input.files[0]) {
                const file = input.files[0];
                const reader = new FileReader();

                reader.onload = function(e) {
                    const imgSrc = e.target.result;

                    // Create a new image element
                    const imgElement = CKEDITOR.dom.element.createFromHtml(
                        `<img src="${imgSrc}" alt="Uploaded Image">`);

                    // Insert the image at the end of the CKEditor content
                    editor.insertElement(imgElement);
                };

                reader.readAsDataURL(file);
            }
        });
    </script>
    <script type="text/javascript">
        var sig = $('#sig').signature({
            syncField: '#signature64',
            syncFormat: 'PNG'
        });
        $('#clear').click(function(e) {
            e.preventDefault();
            sig.signature('clear');
            $("#signature64").val('');
        });
    </script> --}}

    <script src="https://code.jquery.com/jquery-3.6.3.min.js"
        integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>

    <script>
        $(document).ready(function() {

            $('.addCat').click(function() {
                $('#addContinent').modal('show');
                var id = $(this).data('id');
                //   alert(id);
                $('#proId').val(id);
            });
        });
    </script>


@endsection
