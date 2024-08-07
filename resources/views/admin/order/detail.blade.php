@extends('layouts.app')
@section('content')
    <div class="container mt-5 mb-5">
        <h2>Thông tin đơn hàng của: {{ $order->user->name }}</h2>
        @if (!empty($order))
            <table class="table table-bordered">
                <tr>
                    <td>Email: {{ $order->user->email }}</td>
                    <td>Ngày đặt: {{ $order->date }}</td>
                    <td>Tổng tiền: {{ $order->price_format($order->total_price) }}</td>
                </tr>
            </table>
            @if (!empty($orderDetails))
                <table class="table table-bordered">
                    <tr>
                        <th>Ảnh</th>
                        <th>Tên</th>
                        <th>Số lượng</th>
                        <th>Tổng tiền</th>
                    </tr>
                    @foreach ($orderDetails as $detail)
                        <tr>
                            <td>
                                <img src="{{ asset('images/products/' . $detail->product->photo . '') }}" style="height: 50px" alt="">
                            </td>
                            <td><a href="{{ route('detail', $detail->id) }}">{{ $detail->product->name }}</a></td>
                            <td>{{ $detail->quantity }}</td>
                            <td>{{ $detail->price_format($detail->price) }}</td>
                        </tr>
                    @endforeach
                </table>
            @endif
        @endif
        <a href="{{ route('admin.order.index') }}" class="btn btn-danger">Quay lại trang quản lý đơn hàng</a>
    </div>
@endsection
