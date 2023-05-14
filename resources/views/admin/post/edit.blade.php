@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Thêm bài viết') }}</div>

                    <div class="card-body">
                        @if (Session::has('success'))
                            <div class="alert alert-success">
                                {{ Session::get('success') }}
                            </div>
                        @endif
                        <form method="POST" action="{{ route('post.edit',['id'=>$post->id]) }}" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="row mb-3">
                                <div class="col-12">
                                    <div class="row">
                                        <label for="title"
                                            class="col-md-4 col-form-label text-md-end">{{ __('Tiêu đề') }}</label>
                                        <div class="col-md-6">
                                            <input type="text" id="title" class="form-control @error('title') is-invalid @enderror"
                                                name="title" value="{{ $post->title }}" required autofocus>

                                            @error('title')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 mt-3">
                                    <div class="row">
                                        <label for="summary"
                                            class="col-md-4 col-form-label text-md-end">{{ __('Tóm tắt') }}</label>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <textarea class="form-control" id="summary" required rows="3" name="summary">{{ $post->summary }}</textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 mt-3">
                                    <div class="row">
                                        <label for="content"
                                            class="col-md-4 col-form-label text-md-end">{{ __('Nội dung') }}</label>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <textarea class="form-control" id="content" required rows="3" name="content">{{ $post->content }}</textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 mt-3">
                                    <div class="row">
                                        <label for="formFile"
                                            class="col-md-4 col-form-label text-md-end">{{ __('Hình ảnh') }}</label>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <input class="form-control @error('image') is-invalid @enderror" type="file" id="formFile" name="image">
                                                @error('image')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                              </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 mt-3">
                                    <div class="row">
                                        <label for="belong_category"
                                            class="col-md-4 col-form-label text-md-end">{{ __('Thuộc chuyên mục') }}</label>
                                        <div class="col-md-6">
                                            <select class="form-select" aria-label="Default select example" id="belong_category" name="belong_category">
                                                @foreach ($category as $item)
                                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                                                @endforeach
                                              </select>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-0">
                                <div class="col-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Sửa bài viết') }}
                                    </button>
                                </div>
                                <div class="col-6 mt-2 offset-md-4">
                                    <a class="btn btn-warning" href="{{ route('post') }}"
                                        role="button">{{ __('Quay lại') }}</a>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
