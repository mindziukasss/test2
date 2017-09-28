@extends('admin.core')

@section('title', 'Blog Admin Panel')

@section('content')


    <h1>Your Posts</h1>
    <a class="btn btn-primary pull-right" href="{{ route('posts.create') }}">Add New Blog Post</a>
    <a class="btn btn-primary pull-right" href="/">All Posts</a>
    <br>
    <br>
    <br>

    <table class="table">
        <thead>
        <th>title</th>
        <th>body</th>
        <th>image</th>
        <th>Show</th>
        <th>edit</th>
        <th>delete</th>
        </thead>
        <tbody>

        @foreach($posts as $post)

            <tr>
                <td>{{ $post['title'] }}</td>
                <td>{{ $post['body'] }}</td>
                <td><img src="/images/{{ $post['image'] }}"></td>
                <td><a href="{{route('posts.show', $post['id'])}}" class="btn btn-default">Show</a>
                <td><a href="{{route('posts.edit', $post['id'])}}" class="btn btn-primary">Edit</a>
                <td>
                    <form action="{{ route('posts.destroy', ['id'=>$post['id']]) }}" method="POST">
                        {{ csrf_field() }}
                        <input type="hidden" name="_method" value="DELETE">
                        <input type="submit" value='Delete' class="btn btn-danger">
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
