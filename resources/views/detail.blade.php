@extends('layouts.app')
@section('content')
    <div id="main-info">
        <div class="header-main">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="list">
                            <ul>
                                <li><a href="#">Menu </a></li>
                                <li>/</li>
                                <li><a href="#">{{ $product->type->name }}</a></li>
                                <li>/</li>
                                <li><a href="#">{{ $product->name }}</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6 col-md-12 col-12">
                        <div class="big">
                            <img src="{{ asset('images/products/' . $product->photo) }}" alt="">
                        </div>
                        <div class="mini">
                            <img src="{{ asset('images/products/' . $product->photo) }}" alt="">
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-12 col-12">
                        <form action="{{ route('addCart') }}" method="post">
                            @csrf
                            <input type="hidden" name="product_id" value="{{ $product->id }}">
                            <h2>{{ $product->name }}</h2>
                            <h2 class="money">{{ $product->price_format($product->price) }}</h2>
                            <br>
                            <p style="font-size: 1.5rem">Chọn size(bắt buộc)</p>
                            <div class="row option-size">
                                <div class="d-flex col-lg-3 align-items-center p-2 m-2 size">
                                    <img src="{{ asset('images/icon/glass_coffee.svg') }}"
                                        style="max-height: 15px; max-width: 15px;" alt="">
                                    <input type="hidden" name="size-small" value="" class="me-2 size-input">
                                    <p class="mb-0">Nhỏ + 0đ</p>
                                </div>
                                <div class="d-flex col-lg-3 align-items-center p-2 m-2 size">
                                    <img src="{{ asset('images/icon/glass_coffee.svg') }}"
                                        style="max-height: 20px; max-width: 20px;" alt="">
                                    <input type="hidden" name="size-medium" value="" class="me-2 size-input">
                                    <p class="mb-0">Vừa + 6000đ</p>
                                </div>
                                <div class="d-flex col-lg-3 align-items-center p-2 m-2 size">
                                    <img src="{{ asset('images/icon/glass_coffee.svg') }}"
                                        style="max-height: 30px; max-width: 30px;" alt="">
                                    <input type="hidden" name="size-large" value="" class="me-2 size-input">
                                    <p class="mb-0">Lớn + 10000đ</p>
                                </div>
                            </div>
                            @if (!empty($toppings))
                                <p class="title">Topping</p>
                                <div class="option-topping">
                                    @foreach ($toppings as $topping)
                                        <div class="topping-item">
                                            <input type="hidden" name="toppings[]" value="0"
                                                class="me-2 topping-input">
                                            {{ $topping->topping->name }} +
                                            {{ $topping->topping->price_format($topping->topping->price) }}
                                        </div>
                                    @endforeach
                                </div>
                            @endif
                            <button class="buy" type="submit">
                                <i class="fas fa-cart-plus"></i>
                                Đặt giao tận nơi
                            </button>
                        </form>
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
                    @if ($products)
                        @foreach ($products as $product)
                            <div class="col-lg-2 col-md-4 col-6">
                                <a href="{{ route('detail', $product->id) }}"><img
                                        src="{{ asset('images/products/' . $product->photo . '') }}" style="width: 100%"
                                        alt=""></a>
                                <h4><a href="{{ route('detail', $product->id) }}">{{ $product->name }}</a></h4>
                                <p>{{ $product->price_format($product->price) }}</p>
                            </div>
                        @endforeach
                    @endif
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
                var sizeInput = this.querySelector('.size-input');
                sizeInput.value = 'true';
            });
        });


        const $ = document.querySelector.bind(document);
        const $$ = document.querySelectorAll.bind(document);

        const tabs = $$(".size-item");
        const panes = $$(".topping-item");

        tabs.forEach((tab, index) => {
            tab.onclick = function() {
                $(".size-item.active").classList.remove("active");
                this.classList.add("active");
            };
        });
        panes.forEach((pane, index) => {
            pane.onclick = function() {
                var input = this.querySelector('.topping-input');
                if (pane.classList.contains("active")) {
                    pane.classList.remove("active");
                    input.value = 0;
                } else {
                    this.classList.add("active");
                    input.value = 1;
                }
            };
        });
    </script>
@endsection
