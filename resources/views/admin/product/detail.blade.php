@extends('layouts.app')
@section('content')
    <div class="container mt-5 mb-5">
        <h2>Thông tin sản phẩm</h2>
        @if (!empty($product))
            <table class="table table-bordered">
                <tr>
                    <td>Ảnh sản phẩm</td>
                    <td>
                        <img src="{{ asset('images/products/' . $product->photo . '') }}" style="height: 200px" alt="">
                    </td>
                </tr>
                <tr>
                    <td>Tên sản phẩm</td>
                    <td>{{ $product->name }}</td>
                </tr>
                <tr>
                    <td>Giá</td>
                    <td>{{ $product->price_format($product->price) }}</td>
                </tr>
                <tr>
                    <td>Thông tin chi tiết</td>
                    <td>{{ $product->description }}</td>
                </tr>
                <tr>
                    <td>Loại sản phẩm</td>
                    <td>{{ $product->type->name }}</td>
                </tr>
            </table>

            @if (count($detailToppings)>0)
                <table class="table table-bordered">
                    <tr>
                        <th>Tên loại topping</th>
                        <th>Giá topping</th>
                    </tr>
                    @foreach ($detailToppings as $topping)
                        <tr>
                            <td>{{ $topping->topping->name }}</td>
                            <td>{{ $topping->topping->price_format($topping->topping->price) }}</td>
                        </tr>
                    @endforeach
                </table>
                @endif
        @endif
        <a href="{{ route('admin.product.index') }}" class="btn btn-danger">Quay lại trang quản lý sản phẩm</a>
    </div>
@endsection
