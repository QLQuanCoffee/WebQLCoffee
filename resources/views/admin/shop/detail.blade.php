@extends('layouts.app')
@section('content')
    <div class="container mt-5 mb-5">
        <h2>Thông tin cửa hàng</h2>
        @if (!empty($shop))
            <table class="table table-bordered">
                <tr>
                    <td>Ảnh cửa hàng</td>
                    <td>
                        <img src="{{ asset('images/shops/' . $shop->photo . '') }}" style="height: 200px" alt="">
                    </td>
                </tr>
                <tr>
                    <td>Tên cửa hàng</td>
                    <td>{{ $shop->name }}</td>
                </tr>
                <tr>
                    <td>Địa chỉ</td>
                    <td>{{ $shop->address }}</td>
                </tr>
                <tr>
                    <td>Thông tin chi tiết</td>
                    <td>{{ $shop->description }}</td>
                </tr>
                <tr>
                    <td>Thời gian hoạt động</td>
                    <td>{{ $shop->time }}</td>
                </tr>
            </table>
        @endif
        <a href="{{ route('admin.shop.index') }}" class="btn btn-danger">Quay lại trang quản lý cửa hàng</a>
    </div>
@endsection
