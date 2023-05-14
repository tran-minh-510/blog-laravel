@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Danh sách chuyên mục') }}</div>

                    <div class="card-body">
                        @if (Session::has('success'))
                            <div class="alert alert-danger">
                                {{ Session::get('success') }}
                            </div>
                        @endif
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">STT</th>
                                    <th scope="col">Tiêu đề</th>
                                    <th scope="col">Hình ảnh</th>
                                    <th scope="col">Thuộc chuyên mục</th>
                                    <th scope="col">Lựa chọn</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if (count($posts) === 0)
                                    <tr>
                                        <td colspan="3" scope="col">
                                            <div class="alert alert-danger">
                                                Không có bài viết nào, nhấn vào 
                                                <a href="{{ route('post.create') }}">{{ __('đây') }}</a>
                                                để thêm bài viết.
                                            </div>
                                        </td>
                                    </tr>
                                @endif
                                @foreach ($posts as $key => $item)
                                    <tr>
                                        <th scope="row">{{ $key + 1 }}</th>
                                        <td>{{ $item->title }}</td>
                                        <td style="width:100px">
                                            <img src="{{asset("/uploads/".$item->image)}}" alt="Image" class="img-fluid">
                                        </td>
                                        <td>
                                            {{ $item->category->name }}
                                        </td>
                                        <td>
                                            <a href="{{ route('post.show.edit', ['id' => $item->id]) }}"
                                                class="link-primary">Sửa</a>
                                            <form method="POST"
                                                action="{{ route('post.delete', ['id' => $item->id]) }}">
                                                @csrf
                                                @method('delete')
                                                <button type="submit" style="border:none;background:transparent;padding:0">
                                                    <span style="color:red;text-decoration:underline;">Xóa</span>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{ $posts->links() }}
                        <a class="btn btn-warning" href="{{ route('admin') }}" role="button">{{ __('Quay lại trang chủ') }}</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
