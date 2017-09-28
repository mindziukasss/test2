@extends('admin.core')

@section('title', 'Add New Blog Post')

@section('content')
    @if(isset($post['id']))
        <h1>Edit Post {{ $post->title }}</h1>
        <div class="col-sm-8 col-sm-offset-2">
            <form action="{{ route('posts.update', ['id'=>$post->id]) }}" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                <input type="hidden" name="_method" value="PUT">

                <div class="form-group">
                    <label for="title">Title:</label>
                    <input name="title" type="text" class="form-control" value="{{ $post->title }}">
                </div>

                <div class="form-group">
                    <label for="body">Body:</label>
                    <textarea name="body" id="" cols="30" rows="10" class="form-control">{{ $post->body }}</textarea>
                </div>

                <div class="form-group">
                    <label for="path">Upload a picture</label>
                    <input type="file" class="form-control-file" id="image" name="image" {{ $post->image }}>
                    <small id="pathHelp" class="form-text text-muted">Add a picture to represent your post
                    </small>
                </div>


                <button type="submit" class="btn btn-primary">Submit</button>
                <a class="btn btn-default pull-right" href="{{ route('posts.index') }}">Go Back</a>
            </form>
        </div>
    @else
        <h1>Add New Blog Post</h1>
        <div class="col-sm-8 col-sm-offset-2">
            <form action="{{ route('posts.store') }}" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="title">Title:</label>
                    <input name="title" type="text" class="form-control">
                </div>

                <div class="form-group">
                    <label for="body">Body:</label>
                    <textarea name="body" id="" cols="30" rows="10" class="form-control"></textarea>
                </div>

                <div class="form-group">
                    <label for="path">Upload a picture</label>
                    <input type="file" class="form-control-file" id="image" name="image">
                    <small id="pathHelp" class="form-text text-muted">Add a picture to represent your post
                    </small>
                </div>

                <button type="submit" class="btn btn-primary">Submit</button>
                <a class="btn btn-default pull-right" href="{{ route('posts.index') }}">Go Back</a>
            </form>
        </div>
    @endif





@endsection