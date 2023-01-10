@extends('layouts.admin_master')
@section('title', 'Admin Dashboard')
@section('content')
    <div class="container">
        <div class="mx-4">
            <div class="d-flex justify-content-between">
                <h2>Create Post</h2>
                <a href="{{ route('post.index') }}" class="btn btn-success">List Post</a>
            </div>
            <div class="border-bottom"></div>
        </div>
        <form action="{{ route('post.store') }}" method="post">
            @csrf
            <div class="mb-3">
                <label for="" class="form-label">Name</label>
                <input type="text" class="form-control" name="name" value='{{ old('name') }}' id=""
                    aria-describedby="helpId" placeholder="">
                @error('name')
                    <small id="helpId" class="text-danger">{{ $message }}</small>
                @enderror
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Mô tả ngắn</label>
                <input type="text" class="form-control" name="small_description" value='{{ old('small_description') }}'
                    id="" aria-describedby="helpId" placeholder="">
                @error('small_description')
                    <small id="helpId" class="text-danger">{{ $message }}</small>
                @enderror
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Danh mục cha</label>
                <select class="form-select form-select-lg" name="category_id" id="">
                    <option selected value="0">Choose post</option>
                    {{ recursiveCategory($categories, $html) }}
                    {!! $html !!}
                </select>
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Nội dung</label>
                <textarea id="my-editor" name="description" class="form-control">{!! old('description') !!}</textarea>
            </div>
            <div class="mb-3">
                <label for="">Image</label>
                <div class="input-group">
                    <span class="input-group-btn">
                        <a id="lfm" data-input="thumbnail" data-preview="holder" class="btn btn-primary">
                            <i class="fa fa-picture-o"></i> Choose
                        </a>
                    </span>
                    <input id="thumbnail" class="form-control" type="hidden" name="filepath">
                </div>
                <div id="holder" style="">
                </div>
            </div>
            <div class="mb-3">
                <button class="btn btn-success">Create</button>
            </div>
        </form>
    </div>
@endsection


@section('script')
    <!-- CKEditor init -->
    <script src="//cdnjs.cloudflare.com/ajax/libs/ckeditor/4.5.11/ckeditor.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/ckeditor/4.5.11/adapters/jquery.js"></script>
    <script>
        var options = {
            filebrowserImageBrowseUrl: '/laravel-filemanager?type=Images',
            filebrowserImageUploadUrl: '/laravel-filemanager/upload?type=Images&_token=',
            filebrowserBrowseUrl: '/laravel-filemanager?type=Files',
            filebrowserUploadUrl: '/laravel-filemanager/upload?type=Files&_token='
        };
        $('textarea[name=description]').ckeditor(options);
    </script>

    <script src="/vendor/laravel-filemanager/js/stand-alone-button.js"></script>
    <script>
        $('#lfm').filemanager('image');
    </script>

@endsection
