@extends('layouts.app')
@section('content')
    <div class="container mt-5 mb-5">
        <div class="row">
            <a href="{{ route('admin.product.insert') }}" class="btn btn-primary mb-2">Thêm sản phẩm</a>
            @if (count($products) > 0)
                <table class="table table-bordered">
                    <tr>
                        <th>Ảnh</th>
                        <th>Tên</th>
                        <th>Giá</th>
                        <th>Loại</th>
                        <th>Chỉnh sửa</th>
                    </tr>
                    @foreach ($products as $product)
                        <tr>
                            <td>
                                <img src="{{ asset('images/products/'.$product->photo.'') }}" style="width: 100px"
                                    alt="">
                            </td>
                            <td><a href="{{ route('admin.product.detail', $product->id) }}">{{ $product->name }}</a></td>
                            <td>{{ $product->price_format($product->price) }}</td>
                            <td>{{ $product->type->name }}</td>
                            <td>
                                <a href="{{ route('admin.product.update', ['id' => $product->id]) }}"
                                    class="btn btn-success">Sửa</a> |
                                <form action="{{ route('admin.product.delete', $product->id) }}" method="GET"
                                    onsubmit="return confirm('{{ trans('Bạn có muốn xoá product này không ? ') }}');"
                                    style="display: inline-block;">
                                    @csrf
                                    <input type="submit" class="btn btn-danger" value="Delete">
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </table>
            @endif
            <a href="{{ route('admin.home') }}" class="btn btn-danger">Quay lại trang chủ admin</a>
        </div>
    </div>
@endsection
