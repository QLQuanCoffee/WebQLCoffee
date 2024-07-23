@extends('layouts.app')
@section('content')
<div id="shop">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-12">
                <h2><i class="fas fa-file file"></i> Xác nhận đơn hàng</h2>
            </div>

            <div class="col-lg-6 col-md-12 col-12">
                <div class="row check">
                    <div class="col-4">
                        <h4>Giao hàng</h4>
                    </div>
                    <div class="col-4">
                        <div class="content">
                            <a href="">Đổi phương thức</a>
                        </div>
                    </div>

                    <div class="col-12">
                        <a href="">
                            <div class="row">
                                <div class="col-2">
                                    <div class="icon">
                                        <i class="far fa-shipping-fast"></i>
                                    </div>
                                </div>
                                <div class="col-8">
                                    <h5>Đường Phan Văn Trị</h5>
                                    <p>Đường Thới Hòa, Xã Vĩnh Lộc A, Huyện Bình Chánh, Tp.HCM</p>
                                </div>
                                <div class="col-2">
                                    <div class="right">
                                        <i class="fas fa-chevron-right"></i>
                                    </div>
                                </div>
                            </div>
                        </a>
                        <a href="">
                            <div class="row">
                                <div class="col-2">
                                    <div class="icon">
                                        <i class="fas fa-clock"></i>
                                    </div>
                                </div>
                                <div class="col-8">
                                    <h5>Nhận hàng trong ngày từ 15-30 phút</h5>
                                    <p>Vào lúc: Càng sớm càng tốt</p>
                                </div>
                                <div class="col-2">
                                    <div class="right">
                                        <i class="fas fa-chevron-right"></i>
                                    </div>
                                </div>
                            </div>
                        </a>
                        <div class="input">
                            <input type="text" placeholder="Tên người nhận">
                        </div>
                        <div class="input">
                            <input type="text" placeholder="Số điện thoại">
                        </div>
                        <div class="input">
                            <input type="text" placeholder="Thêm hướng dẫn giao hàng">
                        </div>
                    </div>
                    <div class="col-12 pay-by">
                        <div class="row check">
                            <div class="col-4">
                                <h4>Tổng cộng</h4>
                            </div>
                            <ul>
                                <li>
                                    <input type="radio" name="pay-by" id="">
                                    <img src="{{ asset('images/icon/1000_photo_2021-04-06_11-17-08.jpg') }}" alt="">
                                    <span>Tiền mặt</span>
                                </li>
                                <li>
                                    <input type="radio" name="pay-by" id="">
                                    <img src="{{ asset('images/icon/386_ic_momo@3x.png') }}" alt="">
                                    <span>MoMo</span>
                                </li>
                                <li>
                                    <input type="radio" name="pay-by" id="">
                                    <img src="{{ asset('images/icon/388_ic_zalo@3x.png') }}" alt="">
                                    <span>ZaloPay - Giảm 10K đơn 60K</span>
                                </li>
                                <li>
                                    <input type="radio" name="pay-by" id="">
                                    <img src="{{ asset('images/icon/1120_1119_ShopeePay-Horizontal2_O (1).png') }}" alt="">
                                    <span>ShopeePay</span>
                                </li>
                                <li>
                                    <input type="radio" name="pay-by" id="">
                                    <img src="{{ asset('images/icon/385_ic_atm@3x.png') }}" alt="">
                                    <span>Thẻ ngân hàng</span>
                                </li>
                            </ul>
                            <div class="question">
                                <i class="far fa-check-square"></i>
                                <span> Đồng ý với các <a href="">điều khoản và điều kiện</a> mua hàng của The Coffee House</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-12 col-12 box-shadow">
                <div class="row check">
                    <div class="col-4">
                        <h4>Các món đã chọn</h4>
                    </div>
                    <div class="col-4">
                        <div class="content">
                            <a href="">Thêm món</a>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="row info-buy">
                            <div class="col-8">
                                <a href="">
                                    <i class="fas fa-pen"></i>
                                </a>
                                <div class="info">
                                    <h6>2 x Đường đen sữa đá</h6>
                                    <p>Vừa, 2 x Vừa</p>
                                    <p>Xóa</p>
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="money">
                                    <p>98.000đ</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="row info-buy">
                            <div class="col-8">
                                <a href="">
                                    <i class="fas fa-pen"></i>
                                </a>
                                <div class="info">
                                    <h6>1 x Hi-Tea Đào Kombucha</h6>
                                    <p>Vừa, 1 x Vừa</p>
                                    <p>Xóa</p>
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="money">
                                    <p>65.000đ</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="row info-buy">
                            <div class="col-8">
                                <a href="">
                                    <i class="fas fa-pen"></i>
                                </a>
                                <div class="info">
                                    <h6>1 x CloudTea Oolong</h6>
                                    <p>Nhỏ, 1 x Nhỏ</p>
                                    <p>Xóa</p>
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="money">
                                    <p>59.000đ</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row check">
                    <div class="col-4">
                        <h4>Tổng cộng</h4>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="row info-buy border-btn">
                            <div class="col-8">
                                <div class="pay">
                                    <p>Thành tiền</p>
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="money">
                                    <p>222.000đ</p>
                                </div>
                            </div>
                        </div>
                        <div class="row info-buy border-btn">
                            <div class="col-8">
                                <div class="pay">
                                    <p>Phí giao hàng</p>
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="money">
                                    <p>18.000đ</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row pay-money">
                    <div class="col-12">
                        <div class="row info-buy">
                            <div class="col-8">
                                <div class="pay white">
                                    <p>Thành tiền</p>
                                    <p>222.000đ</p>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="push">
                                    <a href="">Đặt hàng</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row delete">
                    <div class="col-12">
                        <i class="fas fa-trash"></i>
                        <span>Xóa đơn hàng</span>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection