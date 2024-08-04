@extends('layouts.app')
@section('content')
    <div class="container mt-5 mb-5">
        <a href="{{ route('admin.type.insert') }}" class="btn btn-primary mb-2">Thêm loại sản phẩm mới</a>
        <table class="table table-bordered">
            <tr>
                <th>Tên loại</th>
                <th>Chỉnh sửa</th>
            </tr>
            @if (!empty($types))
                @foreach ($types as $type)
                    <tr>
                        <td>{{ $type->name }}</td>
                        <td><a href="{{ route('admin.type.update', ['id' => $type->id]) }}" class="btn btn-success">Sửa</a> |
                            <form action="{{ route('admin.type.delete',$type->id) }}" method="GET"
                                onsubmit="return confirm('{{ trans('Bạn có muốn xoá loại sản phẩm này không ? ') }}');"
                                style="display: inline-block;">
                                @csrf
                                <input type="submit" class="btn btn-danger"
                                    value="Delete">
                            </form>
                    </tr>
                @endforeach
            @endif
        </table>
        <a href="{{ route('admin.home') }}" class="btn btn-danger">Quay lại trang chủ admin</a>
    </div>
@endsection
