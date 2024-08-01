@extends('layouts.app')
@section('content')
    <div class="container mt-5 mb-5">
        <h2>Quản lý đơn hàng</h2>
        <table class="table table-bordered">
            <tr>
                <th>Email</th>
                <th>Họ Tên</th>
                <th>Ngày đặt</th>
                <th>Tổng tiền</th>
                <th>Chỉnh sửa</th>
            </tr>
            @if (!empty($orders))
                @foreach ($orders as $order)
                    <tr>
                        <td><a href="{{ route('admin.order.detail', $order->id) }}">{{ $order->user->email }}</a></td>
                        <td>{{ $order->user->name }}</td>
                        <td>{{ $order->date }}</td>
                        <td>{{ $order->price_format($order->total_price) }}</td>
                        <td>
                            <form action="{{ route('admin.order.delete', $order->id) }}" method="GET"
                                onsubmit="return confirm('{{ trans('Bạn có muốn xoá order này không ? ') }}');"
                                style="display: inline-block;">
                                @csrf
                                <input type="submit" class="btn btn-danger" value="Delete">
                            </form>
                        </td>
                    </tr>
                @endforeach
            @endif
        </table>
    </div>
@endsection
