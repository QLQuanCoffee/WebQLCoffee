<div id="nav_bar">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-4 col-4">
                <a href="./sinhvien.html">
                    <div class="info">
                        <img src="{{ asset('images/navbar/icon_vitri.webp') }}" alt="">
                        <p>154 Cửa hàng khắp cả nước</p>
                    </div>
                </a>
            </div>
            <div class="col-lg-3 col-md-4 col-4">
                <a href="./sinhvien.html">
                    <div class="info">
                        <img src="{{ asset('images/navbar/phone.webp') }}" alt="">
                        <p>Đặt hàng: 1800.6936</p>
                    </div>
                </a>
            </div>
            <div class="col-lg-3 col-md-4 col-4">
                <a href="./sinhvien.html">
                    <div class="info">
                        <img src="{{ asset('images/navbar/ship.webp') }}" alt="">
                        <p>Freeship từ 50.000vnd</p>
                    </div>
                </a>
            </div>
            <div class="link col-lg-3 col-md-12 col-12">
                <ul>
                    @if (!empty(session()->get('name')))
                        <li>
                            <a href="{{ route('logout') }}">{{ session()->get('name') }}</a>|
                        </li>
                        <li>
                            <a href="{{ route('logout') }}">Đăng xuất</a>
                        </li>
                    @else
                        <li>
                            <a href="{{ route('login') }}">Đăng nhập</a>|
                        </li>
                        <li>
                            <a href="{{ route('register') }}">Đăng ký</a>
                        </li>
                    @endif
                </ul>

            </div>
        </div>
    </div>
</div>
<!-- Container -->
<div id="container">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-12 col-12">
                <a class="link-logo" href="./index.html">
                    <div class="header_logo">
                        <img src="{{ asset('images/container/logo.png') }}" alt="">
                    </div>
                </a>
            </div>
            <div class="col-lg-9 col-md-12 col-12">
                <div class="header_menu">
                    <ul>
                        <li>
                            <a href="">Cà phê</a>
                        </li>
                        <li><a href="">Trà</a></li>
                        <li class="menu">
                            <a href="{{ route('products') }}">Menu</a>
                            <ul class="list_1">
                                <li><a href="{{ route('products') }}">Tất cả</a></li>
                                <li>
                                    <a href="{{ route('products') }}">Cà Phê</a>
                                    <ul class="mini-menu">
                                        <li><a href="{{ route('products') }}">Cà Phê Việt Nam</a></li>
                                        <li><a href="{{ route('products') }}">Cà Phê Máy</a></li>
                                        <li><a href="{{ route('products') }}">Cold Brew</a></li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="{{ route('products') }}">CloudFee</a>
                                    <ul class="mini-menu">
                                        <li><a href="{{ route('products') }}">CloudFee</a></li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="{{ route('products') }}">CloudTea</a>
                                    <ul class="mini-menu">
                                        <li><a href="{{ route('products') }}">CloudTea</a></li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="{{ route('products') }}">Trà</a>
                                    <ul class="mini-menu">
                                        <li><a href="{{ route('products') }}">Trà trái cây</a></li>
                                        <li><a href="{{ route('products') }}">Trà sữa Macchiato</a></li>
                                    </ul>

                                </li>
                                <li>
                                    <a href="{{ route('products') }}">Hi-Tea Healthy</a>
                                    <ul class="mini-menu">
                                        <li><a href="{{ route('products') }}">Hi-Tea Trà</a></li>
                                        <li><a href="{{ route('products') }}">Hi-Tea Đá Tuyết</a></li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="{{ route('products') }}">Bánh & Snack</a>
                                    <ul class="mini-menu">
                                        <li><a href="{{ route('products') }}">Bánh mặn</a></li>
                                        <li><a href="{{ route('products') }}">Bánh ngọt</a></li>
                                        <li><a href="{{ route('products') }}">Đá Tuyết</a></li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="{{ route('products') }}">Tại nhà</a>
                                    <ul class="mini-menu">
                                        <li><a href="{{ route('products') }}">Cà phê tại nhà</a></li>
                                        <li><a href="{{ route('products') }}">Trà tại nhà</a></li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="{{ route('products') }}">Thức uống khác</a>
                                    <ul class="mini-menu">
                                        <li><a href="{{ route('products') }}">Chocolate</a></li>
                                    </ul>
                                </li>

                            </ul>

                        </li>
                        <li class="menu">
                            <a href="{{ route('products') }}">Chuyện Nhà</a>
                            <ul class="list_2">
                                <li>
                                    <a href="{{ route('products') }}">Coffeeholic</a>
                                    <ul class="mini-menu">
                                        <li><a href="{{ route('products') }}">#chuyencaphe</a></li>
                                        <li><a href="{{ route('products') }}">#phacaphe</a></li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="{{ route('products') }}">Teaholic</a>
                                    <ul class="mini-menu">
                                        <li><a href="{{ route('products') }}">#phatra</a></li>
                                        <li><a href="{{ route('products') }}">#cauchuyenvetra</a></li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="{{ route('products') }}">Blog</a>
                                    <ul class="mini-menu">
                                        <li><a href="{{ route('products') }}">#inthemood</a></li>
                                        <li><a href="{{ route('products') }}">#Review</a></li>
                                        <li><a href="{{ route('products') }}">#HumanofTCH</a></li>
                                    </ul>
                                </li>

                            </ul>
                        </li>
                        <li><a href="{{ route('products') }}">Cảm hứng CloudFee</a></li>
                        <li><a href="{{ route('shops') }}">Cửa hàng</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="list-menu">
        <label for="bar">
            <i class="fas fa-bars"></i>
        </label>
        <input type="checkbox" name="" id="bar">
        <div class="header-menu-mini">
            <ul>
                <li><a href="{{ route('shops') }}">Cà phê</a></li>
                <li><a href="{{ route('products') }}">Trà</a></li>
                <li><a href="{{ route('products') }}">Menu</a></li>
                <li><a href="{{ route('products') }}">Chuyện Nhà</a></li>
                <li><a href="{{ route('products') }}">Cảm hứng CloudFee</a></li>
                <li><a href="{{ route('shops') }}">Cửa hàng</a></li>
            </ul>
        </div>
    </div>
    <div class="nav_link">
        <a href="{{ route('cart') }}"><i class="fas fa-shopping-cart shop" style="color: #E57905;"></i></a>
    </div>
</div>
