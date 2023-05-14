@extends('layouts.layout')

@section('content')
    <div class="container">
        <div class="list-post">
            <div class="row g-4">
                @foreach ($post as $item)
                <div class="col-lg-12">
                    <div class="card">
                        <div class="row">
                            <div class="col-5">
                                <img class="card-img-top" src="{{ asset('/uploads/'.$item->image) }}" alt="Card image cap">
                            </div>
                            <div class="col-7">
                                <div class="card-body">
                                    <h5 class="card-title">{{ $item->title }}</h5>
                                    <p class="card-text">{{ $item->summary }}</p>
                                    <a href="{{ $item->category->link }}" class="btn btn-primary">Xem chi tiết</a>
                                  </div>
                            </div>
                        </div>
                      </div>
                </div>
                @endforeach
            </div>
        </div>
        <div class="d-flex justify-content-center mt-3">
            {{ $post->links() }}
        </div>
    </div>
@endsection
