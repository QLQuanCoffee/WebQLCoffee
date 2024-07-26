@extends('layouts.app')
@section('content')
     <!-- Form -->
     <div id="form">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="list">
                        <ul>
                            <li><a href="./index.html">Trang chủ</a></li>
                            <li>/</li>
                            <li><a href="#">Đăng ký</a></li>
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
                    <h3>ĐĂNG KÝ</h3>
                    <div class="row">
                        <form action="{{ route('register') }}" method="post">
                            @csrf
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="">HỌ TÊN</label><br>
                                    <input type="text" placeholder="Nhập họ tên: " name="name" value="{{ old('name') }}">
                                </div>
                                @error('name')
                                    <div class="text-sm text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="">SỐ ĐIỆN THOẠI</label><br>
                                    <input type="text" placeholder="Nhập số điện thoại: " name="phone" value="{{ old('phone') }}">
                                </div>
                                @error('phone')
                                    <div class="text-sm text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="">ĐỊA CHỈ</label><br>
                                    <input type="text" placeholder="Nhập địa chỉ: " name="address" value="{{ old('address') }}">
                                </div>
                                @error('address')
                                    <div class="text-sm text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="">EMAIL</label><br>
                                    <input type="email" placeholder="Nhập email: "  name="email" value="{{ old('email') }}">
                                </div>
                                @error('email')
                                    <div class="text-sm text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="">MẬT KHẨU</label><br>
                                    <input type="text" placeholder="Nhập mật khẩu: " name="password" value="{{ old('password') }}">
                                </div>
                                @error('password')
                                    <div class="text-sm text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-12">
                                <div class="form-btn">
                                    <button type="submit" class="buy">Đăng ký</button>
                                </div>
                            </div>
                        </form>
                        {{-- <div class="col-md-12">
                            <div class="flex">
                                    <div class="cut"></div>
                                    <p>Hoặc</p>
                                    <div class="cut"></div>
                            </div>
                        </div>
                        <div class="col-md-6 col-6">
                            <a href="https://facebook.com">
                                <img src="./assets/img-dangki/face.svg" alt="">
                            </a>
                        </div>
                        <div class="col-md-6 col-6">
                            <a href="https://google.com">
                                <img src="./assets/img-dangki/gg.svg" alt="">
                            </a>
                        </div> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
