@extends('layouts.app')
@section('content')
    <div class="container mt-5 mb-5">
        <a href="{{ route('admin.topping.insert') }}" class="btn btn-primary mb-2">Thêm loại topping mới</a>
        <table class="table table-bordered">
            <tr>
                <th>Tên loại topping</th>
                <th>Giá topping</th>
                <th>Chỉnh sửa</th>
            </tr>
            @if (!empty($toppings))
                @foreach ($toppings as $topping)
                    <tr>
                        <td>{{ $topping->name }}</td>
                        <td>{{ $topping->price_format($topping->price) }}</td>
                        <td><a href="{{ route('admin.topping.update', ['id' => $topping->id]) }}" class="btn btn-success">Sửa</a> |
                            <form action="{{ route('admin.topping.delete',$topping->id) }}" method="GET"
                                onsubmit="return confirm('{{ trans('Bạn có muốn xoá topping này không ? ') }}');"
                                style="display: inline-block;">
                                @csrf
                                <input type="submit" class="btn btn-danger"
                                    value="Delete">
                            </form>
                    </tr>
                @endforeach
            @endif
        </table>
    </div>
@endsection
