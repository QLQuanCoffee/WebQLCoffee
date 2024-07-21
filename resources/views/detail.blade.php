@extends('layouts.app')
@section('content')
    <div id="main-info">
        <div class="header-main">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="list">
                            <ul>
                                <li><a href="">Menu </a></li>
                                <li>/</li>
                                <li><a href="">Cà Phê </a></li>
                                <li>/</li>
                                <li><a href=""> Đường Đen Sữa Đá</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6 col-md-12 col-12">
                        <div class="big">
                            <img src="{{ asset('images/products/duong-den-sua-da.webp') }}" alt="">
                        </div>
                        <div class="mini">
                            <img src="{{ asset('images/products/duong-den-sua-da.webp') }}" alt="">
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-12 col-12">
                        <h2>Đường Đen Sữa Đá</h2>
                        <h2 class="money">45.000 đ</h2>
                        <p class="title">Chọn size (bắt buộc)</p>
                        <div class="option-size">
                            <div class="size-item active">
                                <i class="fas fa-cart-plus"></i>
                                Nhỏ + 0 đ
                            </div>
                            <div class="size-item">
                                <i class="fas fa-cart-plus"></i>
                                Vừa + 4.000 đ
                            </div>
                            <div class="size-item">
                                <i class="fas fa-cart-plus"></i>
                                Lớn + 10.000 đ
                            </div>
                        </div>
                        <p class="title">Topping</p>
                        <div class="option-topping">
                            <div class="topping-item">Kem Phô Mai Macchiato + 10.000 đ</div>
                            <div class="topping-item">Shot Espresso + 10.000 đ</div>
                            <div class="topping-item">Trân châu trắng + 10.000 đ</div>
                            <div class="topping-item">Sốt Caramel + 10.000 đ</div>
                            <div class="topping-item">Thạch Cà Phê + 10.000 đ</div>
                        </div>
                        <button class="buy">
                            <i class="fas fa-cart-plus"></i>
                            Đặt giao tận nơi
                        </button>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-12">
                        <div class="info">
                            <h3>Mô tả sản phẩm</h3>
                            <p>- Sản phẩm không thể thay đổi độ ngọt - Khuấy đều trước khi sử dụng Nếu chuộng vị cà phê đậm đà, bùng nổ và thích vị đường đen ngọt thơm, Đường Đen Sữa Đá đích thị là thức uống dành cho bạn. Không chỉ giúp bạn tỉnh táo buổi sáng, Đường Đen Sữa Đá còn hấp dẫn đến ngụm cuối cùng bởi thạch cà phê giòn dai, nhai cực cuốn.</p>
                        </div>
                    </div>
                </div>
                <div class="row info-sanpham">
                    <div class="col-lg-12 col-md-12 col-12">
                        <h3>Sản phẩm liên quan</h3>
                    </div>
                    <div class="col-lg-2 col-md-4 col-6">
                        <a href="./sanpham.html"><img src="{{ asset('images/products/duong-den-marble.webp') }}" alt=""></a>
                        <h4><a href="./sanpham.html">Đường Đen Marble Latte</a></h4>
                        <p>55.000vnd</p>
                    </div>
                    <div class="col-lg-2 col-md-4 col-6">
                        <a href=""><img src="{{ asset('images/products/sua-da.webp') }}s" alt=""></a>
                        <h4><a href="">Cold Brew Phúc Bồn Tử</a></h4>
                        <p>49.000vnd</p>
                    </div>
                    <div class="col-lg-2 col-md-4 col-6">
                        <a href=""><img src="{{ asset('images/products/phuc-bon-tu.webp') }}" alt=""></a>
                        <h4><a href="">Cà Phê Sữa Đá</a></h4>
                        <p>29.000vnd</p>
                    </div>

                    <div class="col-lg-2 col-md-4 col-6">
                        <a href=""><img src="{{ asset('images/products/sua-da.webp') }}" alt=""></a>
                        <h4><a href="">The Coffee House Sữa Đá</a></h4>
                        <p>39.000vnd</p>
                    </div>
                    <div class="col-lg-2 col-md-4 col-6">
                        <a href=""><img src="{{ asset('images/products/duong-den-sua-da.webp') }}" alt=""></a>
                        <h4><a href="">Đường Đen Sữa Đá</a></h4>
                        <p>45.000vnd</p>
                    </div>
                    <div class="col-lg-2 col-md-4 col-6">
                        <a href=""><img src="{{ asset('images/products/bacsiu-nong.webp') }}" alt=""></a>
                        <h4><a href="">Cà Phê Sữa Nóng</a></h4>
                        <p>39.000vnd</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
