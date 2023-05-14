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
                                    <th scope="col">Tên chuyên mục</th>
                                    <th scope="col">Lựa chọn</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if (count($category) === 0)
                                    <tr>
                                        <td colspan="3" scope="col">
                                            <div class="alert alert-danger">
                                                Không có danh mục nào, nhấn vào 
                                                <a href="{{ route('category.create') }}">{{ __('đây') }}</a>
                                                để thêm chuyên mục.
                                            </div>
                                        </td>
                                    </tr>
                                @endif
                                @foreach ($category as $key => $item)
                                    <tr>
                                        <th scope="row">{{ $key + 1 }}</th>
                                        <td>{{ $item->name }}</td>
                                        <td style="display:flex">
                                            <a href="{{ route('category.show.edit', ['id' => $item->id]) }}"
                                                class="link-primary">Sửa</a>
                                            <span>|</span>
                                            <form method="POST"
                                                action="{{ route('category.delete', ['id' => $item->id]) }}">
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
                        <a class="btn btn-warning" href="{{ route('admin') }}" role="button">{{ __('Quay lại') }}</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
