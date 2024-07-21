@extends('layouts.app')
@section('content')
    <!-- Main -->
    <div id="main">
        <div class="sidebar">
            <ul>
                <li>
                    <a href="#">Tất Cả</a>
                </li>
                <li>
                    <a href="#cf">Cà Phê</a>
                </li>
                <li>
                    <a href="#CloudFee">CloudFee</a>
                </li>
                <li>
                    <a href="#CloudTea">CloudTea</a>
                </li>
                <li>
                    <a href="#Tea">Trà</a>
                </li>
                <li>
                    <a href="#">Hi-Tea Healthy</a>
                </li>
                <li>
                    <a href="#">Bánh & Snack</a>
                </li>
                <li>
                    <a href="#">Tại nhà</a>
                </li>
                <li>
                    <a href="#">Thức uống khác</a>
                </li>
            </ul>
        </div>
        <div class="content">
            <div class="container">
                <div class="row">
                    <h2 id="cf">Cà Phê Việt Nam</h2>
                    <div class="col-lg-4 col-md-6 col-6">
                        <a href="./sanpham.html"><img src="./assets/img-menu/cf-vn/duong-den-sua-da.webp" alt=""></a>
                        <h4><a href="./sanpham.html">Đường Đen Sữa Đá</a></h4>
                        <p>45.000vnd</p>
                    </div>
                    <div class="col-lg-4 col-md-6 col-6">
                        <a href=""><img src="./assets/img-menu/cf-vn/sua-da.webp" alt=""></a>
                        <h4><a href="">The Coffee House Sữa Đá</a></h4>
                        <p>39.000vnd</p>
                    </div>
                    <div class="col-lg-4 col-md-6 col-6">
                        <a href=""><img src="./assets/img-menu/cf-vn/cf-suada.webp" alt=""></a>
                        <h4><a href="">Cà Phê Sữa Đá</a></h4>
                        <p>29.000vnd</p>
                    </div>

                    <div class="col-lg-4 col-md-6 col-6">
                        <a href=""><img src="./assets/img-menu/cf-vn/cf-suanong.webp" alt=""></a>
                        <h4><a href="">Cà Phê Sữa Nóng</a></h4>
                        <p>39.000vnd</p>
                    </div>
                    <div class="col-lg-4 col-md-6 col-6">
                        <a href=""><img src="./assets/img-menu/cf-vn/bac-siu.webp" alt=""></a>
                        <h4><a href="">Bạc Sỉu</a></h4>
                        <p>29.000vnd</p>
                    </div>
                    <div class="col-lg-4 col-md-6 col-6">
                        <a href=""><img src="./assets/img-menu/cf-vn/bacsiu-nong.webp" alt=""></a>
                        <h4><a href="">Bạc Sỉu Nóng</a></h4>
                        <p>39.000vnd</p>
                    </div>
                    <div class="col-lg-4 col-md-6 col-6">
                        <a href=""><img src="./assets/img-menu/cf-vn/cf-den-da.jpg" alt=""></a>
                        <h4><a href="">Cà Phê Đen Đá</a></h4>
                        <p>29.000vnd</p>
                    </div>
                    <div class="col-lg-4 col-md-6 col-6">
                        <a href=""><img src="./assets/img-menu/cf-vn/cf-den-nong.webp" alt=""></a>
                        <h4><a href="">Cà Phê Đen Nóng</a></h4>
                        <p>39.000vnd</p>
                    </div>
                    <div class="col-lg-4 col-md-6 col-6">
                        <a href=""><img src="./assets/img-menu/cf-vn/sua-da-chai.webp" alt=""></a>
                        <h4><a href="">Cà Phê Sữa Đá Chai Fresh 250ML</a></h4>
                        <p>75.000vnd</p>
                    </div>

                </div>
            </div>
            <div class="container">
                <div class="row">
                    <h2>Cà Phê Máy</h2>
                    <div class="col-lg-4 col-md-6 col-6">
                        <a href=""><img src="./assets/img-menu/ca-may/duong-den-marble.webp" alt=""></a>
                        <h4><a href="">Đường Đen Marble Latte</a></h4>
                        <p>55.000vnd</p>
                    </div>
                    <div class="col-lg-4 col-md-6 col-6">
                        <a href=""><img src="./assets/img-menu/ca-may/latte-da.webp" alt=""></a>
                        <h4><a href="">Caramel Macchiato Đá</a></h4>
                        <p>55.000vnd</p>
                    </div>
                    <div class="col-lg-4 col-md-6 col-6">
                        <a href=""><img src="./assets/img-menu/ca-may/caramel-nong.webp" alt=""></a>
                        <h4><a href="">Caramel Macchiato Nóng</a></h4>
                        <p>55.000vnd</p>
                    </div>
                    <div class="col-lg-4 col-md-6 col-6">
                        <a href=""><img src="./assets/img-menu/ca-may/caramel-da.webp" alt=""></a>
                        <h4><a href="">Latte Đá</a></h4>
                        <p>55.000vnd</p>
                    </div>
                    <div class="col-lg-4 col-md-6 col-6">
                        <a href=""><img src="./assets/img-menu/ca-may/latte-nong.webp" alt=""></a>
                        <h4><a href="">Latte Nóng</a></h4>
                        <p>55.000vnd</p>
                    </div>
                    <div class="col-lg-4 col-md-6 col-6">
                        <a href=""><img src="./assets/img-menu/ca-may/americano-da.webp" alt=""></a>
                        <h4><a href="">Americano Đá</a></h4>
                        <p>45.000vnd</p>
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="row">
                    <h2>Cold Brew</h2>
                    <div class="col-lg-4 col-md-6 col-6">
                        <a href=""><img src="./assets/img-menu/cold-brew/phuc-bon-tu.webp" alt=""></a>
                        <h4><a href="">Cold Brew Phúc Bồn Tử</a></h4>
                        <p>49.000vnd</p>
                    </div>
                    <div class="col-lg-4 col-md-6 col-6">
                        <a href=""><img src="./assets/img-menu/cold-brew/sua-tuoi.webp" alt=""></a>
                        <h4><a href="">Cold Brew Sữa Tươi</a></h4>
                        <p>49.000vnd</p>
                    </div>
                    <div class="col-lg-4 col-md-6 col-6">
                        <a href=""><img src="./assets/img-menu/cold-brew/truyen-thong.webp" alt=""></a>
                        <h4><a href="">Cold Brew Truyền Thống</a></h4>
                        <p>45.000vnd</p>
                    </div>

                </div>
            </div>
            <div class="container">
                <div class="row">
                    <h2 id="CloudFee">CloudFee</h2>
                    <div class="col-lg-4 col-md-6 col-6">
                        <a href=""><img src="./assets/img-menu/cloudfee/hanh-nhan-nuong.webp" alt=""></a>
                        <h4><a href="">CloudFee Hạnh Nhân Nướng</a></h4>
                        <p>49.000vnd</p>
                    </div>
                    <div class="col-lg-4 col-md-6 col-6">
                        <a href=""><img src="./assets/img-menu/cloudfee/caramel.webp" alt=""></a>
                        <h4><a href="">CloudFee Caramel</a></h4>
                        <p>49.000vnd</p>
                    </div>
                    <div class="col-lg-4 col-md-6 col-6">
                        <a href=""><img src="./assets/img-menu/cloudfee/hanoi.webp" alt=""></a>
                        <h4><a href="">CloudFee Hà Nội</a></h4>
                        <p>39.000vnd</p>
                    </div>

                </div>
            </div>
            <div class="container">
                <div class="row">
                    <h2 id="CloudTea">CloudTea</h2>
                    <div class="col-lg-4 col-md-6 col-6">
                        <a href=""><img src="./assets/img-menu/cloud-tea/kem-cheese.webp" alt=""></a>
                        <h4><a href="">CloudTea Oolong Nướng Kem Cheese</a></h4>
                        <p>55.000vnd</p>
                    </div>
                    <div class="col-lg-4 col-md-6 col-6">
                        <a href=""><img src="./assets/img-menu/cloud-tea/caramel.webp" alt=""></a>
                        <h4><a href="">CloudTea Oolong Nướng Caramel</a></h4>
                        <p>55.000vnd</p>
                    </div>
                    <div class="col-lg-4 col-md-6 col-6">
                        <a href=""><img src="./assets/img-menu/cloud-tea/dua-da-xay.webp" alt=""></a>
                        <h4><a href="">CloudTea Oolong Nướng Kem Dừa Đá Xay</a></h4>
                        <p>55.000vnd</p>
                    </div>
                    <div class="col-lg-4 col-md-6 col-6">
                        <a href=""><img src="./assets/img-menu/cloud-tea/nuong-kem-dua.webp" alt=""></a>
                        <h4><a href="">TCloudTea Oolong Nướng Kem Dừa</a></h4>
                        <p>55.000vnd</p>
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="row">
                    <h2 id="Tea">Trà trái cây</h2>
                    <div class="col-lg-4 col-md-6 col-6">
                        <a href=""><img src="./assets/img-menu/tra-trai-cay/nhan-hat-sen.webp" alt=""></a>
                        <h4><a href="">Trà Long Nhãn Hạt Sen</a></h4>
                        <p>49.000vnd</p>
                    </div>
                    <div class="col-lg-4 col-md-6 col-6">
                        <a href=""><img src="./assets/img-menu/tra-trai-cay/cam-sa-da.webp" alt=""></a>
                        <h4><a href="">Trà Đào Cam Sả - Đá</a></h4>
                        <p>49.000vnd</p>
                    </div>
                    <div class="col-lg-4 col-md-6 col-6">
                        <a href=""><img src="./assets/img-menu/tra-trai-cay/cam-sa-nong.webp" alt=""></a>
                        <h4><a href="">Trà Đào Cam Sả - Nóng</a></h4>
                        <p>59.000vnd</p>
                    </div>
                    <div class="col-lg-4 col-md-6 col-6">
                        <a href=""><img src="./assets/img-menu/tra-trai-cay/hatsen-da.webp" alt=""></a>
                        <h4><a href="">Trà Đào Cam Sả Chai Fresh 500ML</a></h4>
                        <p>49.000vnd</p>
                    </div>
                    <div class="col-lg-4 col-md-6 col-6">
                        <a href=""><img src="./assets/img-menu/tra-trai-cay/hatsen-nong.webp" alt=""></a>
                        <h4><a href="">The Coffee House Sữa Đá</a></h4>
                        <p>59.000vnd</p>
                    </div>
                    <div class="col-lg-4 col-md-6 col-6">
                        <a href=""><img src="./assets/img-menu/tra-trai-cay/dao-cam-sa-chai.webp" alt=""></a>
                        <h4><a href="">The Coffee House Sữa Đá</a></h4>
                        <p>105.000vnd</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
