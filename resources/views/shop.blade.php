@extends('layouts.app')
@section('content')
    <div class="position-relative d-flex justify-content-center align-items-center"
        style="height: 185px; ;background-image: url('images/banner/banner_ShopWeb.webp')">
        <h2 class="text-center text-white ">Hệ thống 154 cửa hàng The Coffee House trên toàn quốc</h2>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-2 border-right">
                <ul>
                    <li><strong>Theo khu vực</strong></li>
                    <a class="active" href="">
                        <li>Tp Hồ Chí Minh (62)</li>
                    </a>
                    <a href="">
                        <li>Hà Nội (33)</li>
                    </a>
                    <a href="">
                        <li>Hải Phòng (5)</li>
                    </a>
                    <a href="">
                        <li>Đà Nẵng (3)</li>
                    </a>
                    <a href="">
                        <li>Tây Ninh (2)</li>
                    </a>
                    <a href="">
                        <li>Cần Thơ (2)</li>
                    </a>
                    <a href="">
                        <li>Nha Trang (3)</li>
                    </a>
                    <a href="">
                        <li>Kiên Giang (2)</li>
                    </a>
                    <a href="">
                        <li>Nghệ An (4)</li>
                    </a>
                </ul>
            </div>
            <div class="col-10">
                <div class="container">
                    <h3>Khám phá {{ $count }} cửa hàng của chúng tôi ở Tp Hồ Chí Minh</h3>
                    <div class="row">
                        @foreach ($types as $shop)
                            <div class="col-6">
                                <div class="card w-100 mb-2">
                                    <img style="max-height: 270px" src="{{ asset('images/shops/' . $shop->photo) }}"
                                        class="card-img-top" alt="...">
                                    <div class="card-body">
                                        <h5 class="card-title">HCM SIGNATURE by The Coffee House</h5>
                                        <a href="#" class="btn w-100 text-danger" style="background: #f7fbd1">Xem
                                            bản
                                            đồ</a>
                                        <div class="d-flex align-items-center mt-3">
                                            <p class="mb-0 me-2"><strong>Chia sẻ trên:</strong></p>
                                            <a href="" class="d-inline-block mx-2">
                                                <img style="max-width: 25px"
                                                    src="{{ asset('images/icon/icon_facebook.svg') }}" alt="Facebook">
                                            </a>
                                            <a href="" class="d-inline-block mx-2">
                                                <img style="max-width: 25px" src="{{ asset('images/icon/icon_zalo.svg') }}"
                                                    alt="Zalo">
                                            </a>
                                            <a href="" class="d-inline-block mx-2">
                                                <img style="max-width: 25px" src="{{ asset('images/icon/icon_link.svg') }}"
                                                    alt="Link">
                                            </a>
                                        </div>
                                        <hr>
                                        <p class="">TTTM Crescent Mall, 101 Tôn Dật Tiên, phường Tân Phú,
                                            Quận 7, Thành
                                            phố Hồ Chí Minh
                                        </p>
                                        <p>7:00 - 22:00</p>
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
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    @endsection
