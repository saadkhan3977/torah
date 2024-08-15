@extends('admin.layout.layout')

@section('title', 'Admin | Products')

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
    </style>

    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="heading d-flex justify-content-between">
                    <h1>Products</h1>
                    <div class="d-flex">
                        <div class="examplesearch-form mx-3">
                            <form action="" method="" class="example">
                                <input type="text" placeholder="Search.." value="" name="search"
                                    class="form-control">
                                <button type="submit"><i class="fa fa-search"></i></button>
                            </form>
                        </div>
                        <button class="btn btn-dark" data-toggle="modal" data-target="#addProduct">Add Product</button>
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
                        <th>Thumbnail</th>
                        <th>File</th>
                        <th>Title</th>
                        <th>Prices</th>
                        <th>Status</th>
                        <th></th>
                    </thead>
                    <tbody class="border text-center">
                        @foreach ($products as $item)
                            <tr>
                                <td>{{ $item->id }}</td>
                                <td>
                                    <div style="width:70px; height:70px;">
                                        <img src="{{ asset('/uploads/thumbnails/' . $item->pro_thumbnail) }}" alt=""
                                            style="width:70px; height:70px;">
                                    </div>
                                </td>
                                <td>
                                    <div style="width:140px; height:80px;">
                                        <video width="100%" controls="" preload="" muted="" autoplay=""
                                            loop="">
                                            <source src="{{ asset('/uploads/products/' . $item->pro_file) }}">
                                        </video>
                                    </div>
                                </td>
                                <td>{{ $item->pro_title }}</td>
                                <td>Monthly =>$ {{ $item->monthly_price }} <br><br>Three-M => $ {{ $item->three_month_price }} <br><br>Six-M => $ {{ $item->six_month_price }} <br><br>Yearly => $ {{ $item->yearly_price }} </td>
                                <td>
                                    @if ($item->status == 0)
                                        <button class="badge badge-success">Available</button>
                                    @else
                                        <button class="badge badge-dark">Unavailable</button>
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ route('admin.update.product', $item->id) }}">
                                        <i class="update fa fa-pencil text-dark"
                                            style="font-size:22px; cursor: pointer;"></i>
                                    </a>

                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="paginate d-flex justify-content-center align-item-center bg-light p-2"
                    style="border-radius:10px;">
                    <div class="text-dark pt-3">
                        {{ $products->links() }}
                        <div hidden>
                            @if ($products->lastPage() > 1)
                                <ul class="pagination justify-content-center">
                                    <li class="page-item {{ $products->currentPage() == 1 ? ' disabled' : '' }}">
                                        <a class="page-link border_none_pagination"
                                            href="{{ $products->url($products->currentPage() - 1) }}">Previous</a>
                                    </li>
                                    @for ($i = $products->currentPage(); $i <= $products->currentPage() + 8; $i++)
                                        <li class="page-item">
                                            <a class="page-link {{ $products->currentPage() == $i ? ' border_active' : 'border_non_active' }} border_none2"
                                                href="{{ $products->url($i) }}">{{ $i }}</a>
                                        </li>
                                    @endfor
                                    <li
                                        class="page-item {{ $products->currentPage() == $products->lastPage() ? ' disabled' : '' }}">
                                        <a class="page-link border_none_pagination"
                                            href="{{ $products->url($products->currentPage() + 1) }}">Next</a>
                                    </li>
                                </ul>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- Modal add product-->
    <div class="modal fade" id="addProduct" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-dark" id="exampleModalLabel">Product Details</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="sec-form">
                        <form action="{{ route('admin.products.post') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group mb-3">
                                <label for="thumbnail">Thumbnail</label>
                                <input type="file" name="pro_thumbnail"
                                    style="width:100%; padding:8px 0px; color:black; background: rgb(216, 223, 216);">
                            </div>
                            <div class="form-group mb-3">
                                <label for="file">File</label>
                                <input type="file" name="pro_file"
                                    style="width:100%; padding:8px 0px; color:black; background: rgb(216, 223, 216);">
                            </div>
                            <div class="form-group mb-3">
                                <label for="title">Title</label>
                                <input type="text" name="pro_title" class="form-control"
                                    placeholder="Enter product name...">
                            </div>
                            <div class="form-group">
                                <select class="form-select slctOp" name="cat_id" aria-label="Default select example"
                                    style="width:100%; padding: 6px; border: 1px solid rgba(184, 178, 178, 0.521); cursor: pointer;">
                                    <option selected>Select category....</option>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}">
                                            {{ $category->category_name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group mb-3">
                                <label for="price">Price</label>
                                <input type="text" name="monthly_price" class="form-control"
                                    placeholder="Enter monthly price...">
                            </div>
                            <div class="form-group mb-3">
                                <label for="price">Price</label>
                                <input type="text" name="three_month_price" class="form-control"
                                    placeholder="Enter three month price...">
                            </div>
                            <div class="form-group mb-3">
                                <label for="price">Price</label>
                                <input type="text" name="six_month_price" class="form-control"
                                    placeholder="Enter six month price...">
                            </div>
                            <div class="form-group mb-3">
                                <label for="price">Price</label>
                                <input type="text" name="yearly_price" class="form-control"
                                    placeholder="Enter yearly price...">
                            </div>
                            <div class="form-group mb-3">
                                <div class="form-group">
                                    <label><strong>Description :</strong></label>
                                    <textarea class="ckeditor form-control" name="pro_description"></textarea>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-success">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="//cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('.ckeditor').ckeditor();
        });
    </script>

    <!-- Add product continents -->
    <div class="modal fade" id="addContinent" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Product Variants</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="sec-form">
                        <form action="" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group mb-3" hidden>
                                <input type="text" name="pro_id" id="proId" class="form-control">
                            </div>
                            <div class="form-group mb-3">
                                <input type="text" name="pro_var" class="form-control"
                                    placeholder="Enter product continent...">
                            </div>
                            <button type="submit" class="btn btn-success">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

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
