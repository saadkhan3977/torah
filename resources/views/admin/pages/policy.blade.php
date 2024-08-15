@extends('admin.layout.layout')

@section('title', 'Admin | Policies')


@section('admin-content')

    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header bg-dark">
                        <h6 class="text-white">Policy Content</h6>
                    </div>
                    @foreach ($content as $item)
                        <div class="card-body">
                            <form method="post" action="{{ route('admin.post.policy', $item->id) }}"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label>Name</label>
                                    <input type="text" name="name" value="{{ $item->title }}" class="form-control" />
                                </div>
                                <div class="form-group">
                                    <label><strong>Description :</strong></label>
                                    <textarea class="ckeditor form-control" name="description">{{ $item->policy_content }}</textarea>
                                </div>
                    @endforeach
                    <div class="form-group text-center">
                        <button type="submit" class="btn btn-success btn-lg">Update</button>
                    </div>
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



@endsection
