@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Admin') }}</div>

                <div class="card-body">
                    <a class="btn btn-primary" href="{{ route('post.create') }}" role="button">Thêm bài viết</a>
                    <a class="btn btn-primary" href="{{ route('post') }}" role="button">Danh sách bài viết</a>
                </div>
                <div class="card-body">
                    <a class="btn btn-warning" href="{{ route('category.create') }}" role="button">Thêm chuyên mục</a>
                    <a class="btn btn-warning" href="{{ route('category') }}" role="button">Danh sách chuyên mục</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
