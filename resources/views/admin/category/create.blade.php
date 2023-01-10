@extends('layouts.admin_master')
@section('title', 'Admin Dashboard')
@section('content')
    <div class="container">
        <div class="mx-4">
            <div class="d-flex justify-content-between">
                <h2>Create Category</h2>
                <a href="{{ route('category.index') }}" class="btn btn-success">List category</a>
            </div>
            <div class="border-bottom"></div>
        </div>
        <form action="{{ route('category.store') }}" method="post">
            @csrf
            <div class="mb-3">
                <label for="" class="form-label">Name</label>
                <input type="text" class="form-control" name="name" value='{{ old( "name" ) }}' id="" aria-describedby="helpId"
                    placeholder="">
                @error('name')
                    <small id="helpId" class="text-danger">{{ $message }}</small>
                @enderror
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Danh mục cha</label>
                <select class="form-select form-select-lg" name="parent_id" id="">
                    <option selected value="0">Choose Category</option>
                    {{ recursiveCategory( $categories, $html ) }}
                    {!! $html !!}
                </select>
            </div>
            <div class="mb-3">
                <button class="btn btn-success">Create</button>
            </div>
        </form>
    </div>
@endsection
