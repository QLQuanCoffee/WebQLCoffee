@extends('layouts.app')
@section('content')
    <div class="container mt-5 mb-5">
        <a href="{{ route('admin.shop.insert') }}" class="btn btn-primary mb-2">Thêm sản phẩm</a>
        <div class="row">
            @if (count($shops) > 0)
                <table class="table table-bordered">
                    <tr>
                        <th>Ảnh</th>
                        <th>Tên</th>
                        <th>Thời gian</th>
                        <th>Địa chỉ</th>
                        <th>Chỉnh sửa</th>
                    </tr>
                    @foreach ($shops as $shop)
                        <tr>
                            <td>
                                <img src="{{ asset('images/shops/' . $shop->photo . '') }}" style="height: 50px"
                                    alt="">
                            </td>
                            <td><a href="{{ route('admin.shop.detail', $shop->id) }}">{{ $shop->name }}</a></td>
                            <td>{{ $shop->time }}</td>
                            <td>{{ $shop->address }}</td>
                            <td>
                                <a href="{{ route('admin.shop.update', ['id' => $shop->id]) }}"
                                    class="btn btn-success">Sửa</a>
                                <form action="{{ route('admin.shop.delete', $shop->id) }}" method="GET"
                                    onsubmit="return confirm('{{ trans('Bạn có muốn xoá shop này không ? ') }}');"
                                    style="display: inline-block;">
                                    @csrf
                                    <input type="submit" class="btn btn-danger" value="Delete">
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </table>
            @endif
        </div>
    </div>
@endsection
