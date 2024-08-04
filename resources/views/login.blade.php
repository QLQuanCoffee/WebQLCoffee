@extends('layouts.app')
@section('content')
    <!-- Form -->
    <div id="form">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="list">
                        <ul>
                            <li><a href="{{ route('home') }}">Trang chủ</a></li>
                            <li>/</li>
                            <li><a href="#">Đăng nhập</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12 col-12">
                    <div class="row">
                        <div class="col-md-12">
                            <img src="{{ asset('images/container/grandview3.webp') }}" alt="">
                        </div>
                        <div class="col-md-12">
                            <h4>QUYỀN LỢI THÀNH VIÊN</h4>
                            <p>Mua hàng khắp thế giới cực dễ dàng, nhanh chóng</p>
                            <p>Theo dõi chi tiết đơn hàng, địa chỉ thanh toán dễ dàng</p>
                            <p>Nhận nhiều chương trình ưu đãi hấp dẫn từ chúng tôi</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12 col-12">
                    <h3>ĐĂNG NHẬP</h3>
                    <div class="row">
                        <form action="{{ route('login') }}" method="POST">
                            @csrf
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="">EMAIL</label><br>
                                    <input type="email" name="email" placeholder="Nhập email: "
                                        value="{{ old('email') }}">
                                </div>
                                @error('email')
                                    <div class="text-sm text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="">MẬT KHẨU</label><br>
                                    <input type="password" name="password" placeholder="Nhập mật khẩu: "
                                        value="{{ old('password') }}">
                                </div>
                                @error('email')
                                    <div class="text-sm text-danger">{{ $message }}</div>
                                @enderror
                                @if (session('error'))
                                    <div class="alert alert-danger">
                                        {{ session('error') }}
                                    </div>
                                @endif
                            </div>
                            <div class="col-md-12">
                                <div class="form-btn">
                                    <button type="submit" class="buy">Đăng nhập</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
