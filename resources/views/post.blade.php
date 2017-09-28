@extends('admin.core')

@section('title', 'Show Post')

@section('content')

    <div class="row">
        <a href="/">Go to Home</a>
    </div>
    <div class="row">
        <h1>{{ $post->title }}</h1>
        <p>{{ $post->body }}</p>
        <img src="/images/{{ $post->image }}">
    </div>

@endsection