@extends('admin.layout.layout')

@section('title', 'Admin | Queries')


@section('admin-content')

    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="heading d-flex justify-content-between">
                    <h1>Queries</h1>
                </div>
            </div>
        </div>
        <hr>
        <div class="row my-5">
            <div class="col-lg-12">
                <table class="table table-striped">
                    <thead class="bg-dark text-white text-center">
                        <th>#id</th>
                        <th>User name</th>
                        <th>Email</th>
                        <th>Contact</th>
                        <th>Query</th>
                        <th>Status</th>
                    </thead>
                    <tbody class="border text-center">
                        @foreach ($contacts as $contact)
                            <tr>
                                <td>{{ $contact->id }}</td>
                                <td>{{ $contact->name }}</td>
                                <td>{{ $contact->email }}</td>
                                <td>{{ $contact->phone }}</td>
                                <td>{{ Str::limit($contact->message, 150) }}</td>
                                <td>
                                    <form action="" method="">
                                        <button type="submit" class="badge badge-success">reply</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>




@endsection
