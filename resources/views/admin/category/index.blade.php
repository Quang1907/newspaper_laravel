@extends('layouts.admin_master')
@section('title', 'Admin Dashboard')
@section('css')
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.css">
@endsection
@section('content')
    <div class="mx-4">
        <div class="d-flex justify-content-between">
            <h2>Categories List</h2>
            <a href="{{ route('category.create') }}" class="btn btn-success">Create</a>
        </div>
        <div class="border-bottom"></div>
        <div class="table-responsive mt-3">
            <div class="m-auto">
                <form action="{{ route( 'import.category') }}" method="post" id="form" enctype="multipart/form-data"> 
                    @csrf
                    <a href="{{ route( 'users.export' )}}" class="btn btn-success">Export</a>
                    <input type="file" id="file" name="importCategory" class="d-none" accept=".csv, application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel">
                    <button type="button" id="button" class="btn btn-success">File</button>
                </form>
            </div>
            <table class="table table-primary" id="myTable">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Slug</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($categories as $category)
                        <tr class="">
                            <td scope="row">{{ $category->id }}</td>
                            <td>{{ $category->name }}</td>
                            <td>{{ $category->slug }}</td>
                            <td>
                                <form action="{{ route('category.destroy', $category) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <a href="{{ route('category.edit', $category) }}" class="btn btn-warning">Edit</a>
                                    <button class="btn btn-danger">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

    </div>
@endsection

@section('script')
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.js"></script>
    <script>
        $(document).ready(function() {
            $('#myTable').DataTable();
        });
        $('#button').click( function () {
            $('#file').click();
        });
        $('#file').change( function() {
            $('#form').submit();
        })
    </script>
@endsection
