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
                    <h1>Update Products</h1>
                    <div class="d-flex">
                        <div class="examplesearch-form mx-3">
                            <form action="" method="" class="example">
                                <input type="text" placeholder="Search.." value="" name="search"
                                    class="form-control">
                                <button type="submit"><i class="fa fa-search"></i></button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <hr>
        <div class="row justify-content-center pb-5">
            <div class="col-lg-6">
                <div class="sec-form bg-dark p-4" style="border-radius:20px;">
                    <form action="{{ route('admin.update.post') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" value="{{ $product->id }}" name="pro_id">
                        <div class="form-group mb-3">
                            <input type="file" name="pro_thumbnail" value="{{ asset('uploads/thumbnails/' . $product->pro_thumbnail) }}"
                                style="width:100%; padding:8px 0px; color:black; background: rgb(216, 223, 216);">
                            <div style="width:150px; height:100px;">
                                <img src="{{ asset('uploads/thumbnails/' . $product->pro_thumbnail) }}" alt=""
                                    style="width:150px; height:100px;">
                            </div>
                        </div>
                        <div class="form-group mb-3">
                            <input type="file" name="pro_file" value="{{ asset('/uploads/products/' . $product->pro_file) }}"
                                style="width:100%; padding:8px 0px; color:black; background: rgb(216, 223, 216);">
                            <div style="width:200px; height:100px;">
                                <video width="100%" controls="" preload="" muted="" autoplay=""
                                    loop="">
                                    <source src="{{ asset('/uploads/products/' . $product->pro_file) }}">
                                </video>
                            </div>
                        </div>
                        <div class="form-group mb-3">
                            <input type="text" name="pro_title" value="{{ $product->pro_title }}" class="form-control"
                                placeholder="Enter product name...">
                        </div>
                        <div class="form-group mb-3">
                            @php
                                $categories = DB::table('categories')
                                    ->where('id', $product->cat_id)
                                    ->get();
                            @endphp
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
                                <input type="text" name="monthly_price" value="{{ $product->monthly_price }}" class="form-control"
                                    placeholder="Enter monthly price...">
                            </div>
                            <div class="form-group mb-3">
                                <label for="price">Price</label>
                                <input type="text" name="three_month_price" value="{{ $product->three_month_price }}" class="form-control"
                                    placeholder="Enter three month price...">
                            </div>
                            <div class="form-group mb-3">
                                <label for="price">Price</label>
                                <input type="text" name="six_month_price" class="form-control" value="{{ $product->six_month_price }}"
                                    placeholder="Enter six month price...">
                            </div>
                            <div class="form-group mb-3">
                                <label for="price">Price</label>
                                <input type="text" name="yearly_price" class="form-control" value="{{ $product->yearly_price }}"
                                placeholder="Enter yearly price...">
                        </div>
                        <div class="form-group mb-3">
                            <label><strong>Description :</strong></label>
                            <textarea class="ckeditor form-control" name="pro_description">{{ $product->pro_description }}</textarea>
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn btn-success w-25">Submit</button>
                        </div>
                    </form>
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

@endsection
