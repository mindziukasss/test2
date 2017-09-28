@extends('admin.core')

@section('title', 'Blog Home Page')

@section('content')
    <div class="row">
        <div class="container">
            <h1>Welcome to the Blog</h1>
            @if(Auth::check())
                <a href="{{ route('posts.index')  }}">My Posts</a>
            @endif
        </div>


    </div>

    <div>
        <h2>Top 10 Most Recent Blogs</h2>

        @foreach($posts as $post)
            <div class="col-md-12">
                <h3>Title : {{ $post->title }}</h3>
                <p>{{$post->created_at}}</p>
                <img src="images/{{ $post['image'] }}">
                <p>{{ $post->body }}</p>
                <p>Author:{{ Auth::user()->name }}</p>
            </div>
        @endforeach

        <div class="row text-center">
            {{ $posts->links() }}
        </div>
    </div>
@endsection