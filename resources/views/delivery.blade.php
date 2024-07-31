@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h2>Thông tin giao hàng</h2>
                <p>Địa chỉ giao hàng: {{ session('address') }}</p>
            </div>
        </div>
    </div>
@endsection
