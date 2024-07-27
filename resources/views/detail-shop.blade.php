@extends('layouts.app')
@section('content')
    <div id="main-info">
        <div class="header-main">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-md-12 col-12">
                        <div class="big">
                            <img src="{{ asset('images/shops/Signature.webp') }}" alt="">
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-12 col-12">
                        <h2>Tên Quán</h2>
                        <p class="decription">Mô tả</p>
                        <br>
                        <div class="d-flex justify-content-between align-items-center">
                            <p class="mb-0"><strong>Địa chỉ</strong></p>
                            <div class="d-flex align-items-center">
                                <p class="mb-0 me-2"><strong>Chia sẻ trên:</strong></p>
                                <a href="#" class="d-inline-block mx-2">
                                    <img style="max-width: 25px;" src="{{ asset('images/icon/icon_facebook.svg') }}"
                                        alt="Facebook">
                                </a>
                                <a href="#" class="d-inline-block mx-2">
                                    <img style="max-width: 25px;" src="{{ asset('images/icon/icon_zalo.svg') }}"
                                        alt="Zalo">
                                </a>
                                <a href="#" class="d-inline-block mx-2">
                                    <img style="max-width: 25px;" src="{{ asset('images/icon/icon_link.svg') }}"
                                        alt="Link">
                                </a>
                            </div>
                        </div>
                        <p class="mt-1">Địa chỉ quán</p>
                        <div>
                            <p class="mb-0"><strong>Giớ mở cửa</strong></p>
                            <p>Giờ</p>
                        </div>
                        <div class="row w-max">
                            <div class="col-md-6 d-inline-block">
                                <img class="d-inline-block" style="max-width: 20px;"
                                    src="{{ asset('images/icon/icon_car.png') }}" alt="">
                                <p class="d-inline-block">Có chỗ đỗ xe hơi</p>
                            </div>
                            <div class="col-md-6 d-inline-block">
                                <img class="d-inline-block" style="max-width: 20px;"
                                    src="{{ asset('images/icon/icon_shop.png') }}" alt="">
                                <p class="d-inline-block">Phục vụ tại chỗ</p>
                            </div>
                            <div class="col-md-6 d-inline-block">
                                <img class="d-inline-block" style="max-width: 20px;"
                                    src="{{ asset('images/icon/icon_go.png') }}" alt="">
                                <p class="d-inline-block">Phục vụ tại chỗ</p>
                            </div>
                        </div>
                        <hr>
                        <p><strong>Sản phẩm của cửa hàng</strong></p>
                        <a class="btn w-100 btn-products" href="#">Xem tất cả sản phẩm</a>
                        <hr>
                        <div class="info-sop">
                            <p><strong>The Coffee House lân cận</strong></p>
                            <div class="row">
                                <div class="col-3">
                                    <img src="{{ asset('images/blog/blog-home.jpg') }}" alt="">
                                </div>
                                <div class="col-9">
                                    <p class="mb-0"><strong>Tên Quán</strong></p>
                                    <p>Địa chỉ</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
