@extends('layouts.admin_master')
@section('title', 'Posts list')
@section('content')
    <div class="mx-4">
        <div class="d-flex justify-content-between">
            <h2>Posts List</h2>
            <a href="{{ route('post.create') }}" class="btn btn-success">Create</a>
        </div>
        <div class="m-3">
            <form action="" method="get">
                <div class="mb-3 d-flex">
                    <label for="" class="form-label m-2">Tìm kiếm</label>
                    <input type="search" value="{{ request()->search }}" class="form-control w-25" name="search" id="" aria-describedby="helpId"
                        placeholder="">
                </div>
            </form>
        </div>
        <div class="border-bottom"></div>
        <div class="table-responsive">
            <table class="table table-primary">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Slug</th>
                        <th>Image</th>
                        <th>Small Description</th>
                        <th>Category</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($posts as $post)
                        <tr class="">
                            <td>{{ $post->id }}</td>
                            <td>{{ $post->name }}</td>
                            <td>{{ $post->slug }}</td>
                            <td><img src="{{ asset($post->image) }}" class="img-fluid rounded w-25" alt=""></td>
                            <td>{{ $post->small_description }}</td>
                            <td>{{ $post->category->name }}</td>
                            <td>
                                <form action="{{ route('post.destroy', $post) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <a href="{{ route('post.edit', $post) }}" class="btn btn-warning">Edit</a>
                                    <button class="btn btn-danger">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $posts->appends( request()->search )->links('vendor/pagination/bootstrap-4') }}
        </div>

    </div>
@endsection
