@extends('layouts.admin_master')
@section('title', 'Admin Dashboard')
@section('content')
    <div class="mx-4">
        <div class="d-flex justify-content-between">
            <h2>Categories List</h2>
            <a href="{{ route('category.create') }}" class="btn btn-success">Create</a>
        </div>
        <div class="border-bottom"></div>
        <div class="table-responsive">
            <table class="table table-primary">
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
                                <form action="{{ route( 'category.destroy', $category ) }}" method="post">
                                    @csrf
                                    @method( 'DELETE' )
                                    <a href="{{ route( 'category.edit', $category ) }}" class="btn btn-warning">Edit</a>
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
