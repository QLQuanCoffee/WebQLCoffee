@extends('layouts.app')
@section('content')
    <div class="container mt-5 mb-5">
        <a href="{{ route('admin.user.insert') }}" class="btn btn-primary mb-2">Thêm tài khoản mới</a>
        <table class="table table-bordered">
            <tr>
                <th>Tài khoản</th>
                <th>Họ Tên</th>
                <th>Chỉnh sửa</th>
            </tr>
            @if (!empty($users))
                @foreach ($users as $user)
                    <tr>
                        <td><a href="{{ route('admin.user.detail', $user->id) }}">{{ $user->email }}</a></td>
                        <td>{{ $user->name }}</td>
                        <td>
                            <a href="{{ route('admin.user.update', $user->id) }}"
                                class="btn btn-success">Sửa</a>
                            <form action="{{ route('admin.user.delete', $user->id) }}" method="GET"
                                onsubmit="return confirm('{{ trans('Bạn có muốn xoá user này không ? ') }}');"
                                style="display: inline-block;">
                                @csrf
                                <input type="submit" class="btn btn-danger" value="Delete">
                            </form>
                        </td>
                    </tr>
                @endforeach
            @endif
        </table>
        <a href="{{ route('admin.home') }}" class="btn btn-danger">Quay lại trang chủ admin</a>
    </div>
@endsection
