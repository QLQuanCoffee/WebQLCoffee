@extends('layouts.app')
@section('content')
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
