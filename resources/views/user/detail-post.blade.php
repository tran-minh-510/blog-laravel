@extends('layouts.layout')

@section('content')
    <div class="container">
        <div class="detail-post">
            <div class="post-title">
                <h2>{{ $post->title }}</h2>
            </div>
            <div class="post-img">
                <img class="img-fluid" src="{{ asset('/uploads/'.$post->image) }}" alt="">
            </div>
            <div class="post-content">
                {{ $post->content }}
            </div>
        </div>
    </div>
@endsection
