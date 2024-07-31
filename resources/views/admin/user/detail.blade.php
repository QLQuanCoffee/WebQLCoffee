@extends('layouts.app')
@section('content')
    <div class="container mt-5 mb-5">
        <h2>Thông tin user</h2>
        @if (!empty($user))
            <table class="table table-bordered">

                <tr>
                    <td>Họ tên</td>
                    <td>{{ $user->name }}</td>
                </tr>
                <tr>
                    <td>Email</td>
                    <td>{{ $user->email }}</td>
                </tr>
                <tr>
                    <td>Điện thoại</td>
                    <td>{{ $user->phone }}</td>
                </tr>
                <tr>
                    <td>Địa chỉ</td>
                    <td>{{ $user->address }}</td>
                </tr>
            </table>
        @endif
        <a href="{{ route('admin.user.index') }}" class="btn btn-danger">Quay lại trang user</a>
    </div>
@endsection
