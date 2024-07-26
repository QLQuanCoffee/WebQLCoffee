@extends('layouts.app')
@section('content')
<<<<<<< Updated upstream
    <div class="container">
        <div class="row">
            <div class="col-6">
                <img class="w-100"
                    src="https://product.hstatic.net/1000075078/product/1696220139_tra-xanh-espresso-marble_26a0eb92bfd649508d0e93173e9b3083.jpg"
                    alt="">
            </div>
            <div class="col-6">
                <h1>Trà xanh Espresso Marble</h1>
                <h2>49.000đ</h2>
                <br>
                <p style="font-size: 1.5rem">Chọn size(bắt buộc)</p>
                <div class="row option-size">
                    <div class="d-flex align-items-center p-2 m-2 size">
                        <img src="{{ asset('images/icon/glass_coffee.svg') }}" style="max-height: 15px; max-width: 15px;"
                            alt="">
                        <p class="mb-0 ms-2">Nhỏ + 0đ</p>
                    </div>
                    <div class="d-flex align-items-center p-2 m-2 size">
                        <img src="{{ asset('images/icon/glass_coffee.svg') }}" style="max-height: 20px; max-width: 20px;"
                            alt="">
                        <p class="mb-0 ms-2">Vừa + 6000đ</p>
                    </div>
                    <div class="d-flex align-items-center p-2 m-2 size">
                        <img src="{{ asset('images/icon/glass_coffee.svg') }}" style="max-height: 30px; max-width: 30px;"
                            alt="">
                        <p class="mb-0 ms-2">Lớn + 10000đ</p>
                    </div>
=======
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
                                <li><a href="">{{ $product->name }}</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6 col-md-12 col-12">
                        <div class="big">
                            <img src="{{ asset('images/products/',$product->photo) }}" alt="">
                        </div>
                        <div class="mini">
                            <img src="{{ asset('images/products/',$product->photo) }}" alt="">
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-12 col-12">
                        <h2>{{ $product->name }}</h2>
                        <h2 class="money">{{ $product->price_format($product->price) }}</h2>
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
                            @if(!empty($toppings))
                                @foreach ($toppings as $topping)
                                    <div class="topping-item">{{ $topping->topping->name }} + {{ $topping->topping->price }}</div>
                                @endforeach
                            @endif
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
                            <p>{{ $product->description }}</p>
                        </div>
                    </div>
                </div>
                <div class="row info-sanpham">
                    <div class="col-lg-12 col-md-12 col-12">
                        <h3>Sản phẩm liên quan</h3>
                    </div>
                    @if($products)
                        @foreach ($products as $product)
                            <div class="col-lg-2 col-md-4 col-6">
                                <a href="{{ route('detail', $product->id) }}"><img src="{{ asset('images/products/', $product->photo) }}" alt=""></a>
                                <h4><a href="{{ route('detail', $product->id) }}">{{ $product->name }}</a></h4>
                                <p>{{ $product->price }}</p>
                            </div>
                        @endforeach
                    @endif
>>>>>>> Stashed changes
                </div>
            </div>
        </div>
    </div>
    <script>
        const items = document.querySelectorAll(".size");
        items.forEach((item) => {
            item.addEventListener("click", function() {
                items.forEach((element) => element.classList.remove("choose"));
                this.classList.add("choose");
            });
        });
    </script>
@endsection
