@extends('layouts.app')
@section('content')
    <div id="shop">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-12">
                    <h2><i class="fas fa-file file"></i> Xác nhận đơn hàng</h2>
                </div>
                <form class="row" action="{{ route('save.address') }}" method="POST">
                    @csrf
                    <div class="col-lg-6 col-md-12 col-12">
                        <div class="row check">
                            <div class="col-4">
                                <h4>Giao hàng</h4>
                            </div>
                            <div class="col-4">
                                <div class="content">
                                    <a href="#">Đổi phương thức</a>
                                </div>
                            </div>

                            <div class="col-12">
                                <div>
                                    <div class="row">
                                        <div class="col-2">
                                            <div class="icon">
                                                <i class="far fa-shipping-fast"></i>
                                            </div>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="address_option"
                                                id="use_existing_address" value="existing" checked>
                                            <label class="form-check-label" for="use_existing_address">
                                                Giao đến địa chỉ đã lưu: <strong>{{ $user->address }}</strong>
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="address_option"
                                                id="use_new_address" value="new">
                                            <label class="form-check-label" for="use_new_address">
                                                Nhập địa chỉ mới
                                            </label>
                                        </div>
                                        <div class="input-group mt-2" id="new_address_input" style="display: none;">
                                            <input class="w-100" type="text" name="address" class="form-control"
                                                placeholder="Nhập địa chỉ mới">
                                        </div>
                                    </div>
                                </div>
                                <a href="">
                                    <div class="row">
                                        <div class="col-2">
                                            <div class="icon">
                                                <i class="fas fa-clock"></i>
                                            </div>
                                        </div>
                                        <div class="col-8">
                                            <h5>Nhận hàng trong ngày từ 15-30 phút</h5>
                                            <p>Vào lúc: Sau khi ấn đặt hàng 30 phút</p>
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
                                            <img src="{{ asset('images/icon/1000_photo_2021-04-06_11-17-08.jpg') }}"
                                                alt="">
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
                                            <img src="{{ asset('images/icon/1120_1119_ShopeePay-Horizontal2_O (1).png') }}"
                                                alt="">
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
                                        <span> Đồng ý với các <a href="">điều khoản và điều kiện</a> mua hàng của The
                                            Coffee House</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="shop" class="col-lg-6 col-md-12 col-12 box-shadow">
                        <div class="row check">
                            <div class="col-8">
                                <h4>Các món đã chọn</h4>
                            </div>
                            <div class="col-4">
                                <div class="content">
                                    <a href="{{ route('products') }}">Thêm món</a>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            @php $sum = 0; @endphp
                            @if (!empty($carts))
                                @foreach ($carts as $cart)
                                    @php
                                        $priceSize = 0;
                                        if ($cart->size == 'medium') {
                                            $priceSize = 6000;
                                        } else if ($cart->size == 'large'){
                                            $priceSize = 10000;
                                        }
                                        $sum += $cart->quantity * ($cart->product->price+$priceSize);
                                    @endphp
                                    <div class="col-12">
                                        <div class="row info-buy">
                                            <div class="col-md-8 d-flex align-items-center">
                                                <a href="#" class="mr-3">
                                                    <i class="fas fa-pen icon"></i>
                                                </a>
                                                <h6 class="font-weight-bold mb-0 mr-3">{{ $cart->product->name }}</h6>
                                                <form action="{{ route('updateCart') }}" method="post"
                                                    class="update-form form-inline mr-3">
                                                    @csrf
                                                    <input type="hidden" name="id" value="{{ $cart->id }}" />
                                                    <div class="input-group input-group-sm">
                                                        <input type="number" name="quantity"
                                                            value="{{ $cart->quantity }}" class="form-control">
                                                        <span class="input-group-text">{{ $cart->size }}</span>
                                                    </div>
                                                </form>
                                                <form action="{{ route('deleteCart') }}" method="post"
                                                    class="delete-form">
                                                    @csrf
                                                    <input type="hidden" name="id" value="{{ $cart->id }}">
                                                    <button type="submit" class="btn btn-sm delete-item">
                                                        <i class="fas fa-trash"></i>
                                                    </button>
                                                </form>
                                            </div>
                                            <div class="col-md-4 text-right">
                                                <div class="money">
                                                    <p class="price font-weight-bold text-success mb-0">
                                                        {{ $cart->product->price_format($cart->quantity * ($cart->product->price + $priceSize)) }}
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            @endif
                        </div>
                        <div class="row check">
                            <div class="col-8">
                                <h4>Tổng cộng</h4>
                            </div>
                        </div>
                        <div class="row info-buy border-btn">
                            <div class="col-8">
                                <div class="pay">
                                    <p>Thành tiền</p>
                                    <p>Phí giao hàng</p>
                                </div>
                            </div>
                            <div class="col-4 text-right">
                                <div class="money">
                                    <p id="subtotal">{{ $sum > 0 ? $carts[0]->product->price_format($sum) : 0 }}</p>
                                    <p>18.000đ</p>
                                </div>
                            </div>
                        </div>
                        <div class="row pay-money">
                            <div class="col-8">
                                <div class="pay white">
                                    <p>Thành tiền</p>
                                    <p style="color: white" id="total">
                                        {{ $sum > 0 ? $carts[0]->product->price_format($sum + 18000) : 0 }}</p>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="push">
                                    <button class="btn-dathang" type="submit">Đặt hàng</button>
                                </div>
                            </div>
                        </div>
                </form>

                <div class="row delete">
                    <div class="col-12">
                        <form action="{{ route('deleteAllCart') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <button class="btn" type="submit"><i class="fas fa-trash"></i> Xóa đơn
                                hàng</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.update-quantity').on('input', function() {
                var form = $(this).closest('.update-form');
                var quantity = $(this).val();
                var price = parseFloat(form.find('.price').text().replace(/[^0-9.-]+/g, "")) / form.find(
                    'input[name="quantity"]').data('original-quantity');
                var updatedPrice = price * quantity;

                if (quantity <= 0) {
                    alert('Số lượng phải lớn hơn 0');
                    return;
                }

                form.find('.price').text(new Intl.NumberFormat('vi-VN', {
                    style: 'currency',
                    currency: 'VND'
                }).format(updatedPrice));

                var subtotal = 0;
                $('.price').each(function() {
                    subtotal += parseFloat($(this).text().replace(/[^0-9.-]+/g, ""));
                });
                $('#subtotal').text(new Intl.NumberFormat('vi-VN', {
                    style: 'currency',
                    currency: 'VND'
                }).format(subtotal));
                $('#total').text(new Intl.NumberFormat('vi-VN', {
                    style: 'currency',
                    currency: 'VND'
                }).format(subtotal + 18000));
            });

            $('.delete-item').on('click', function(e) {
                e.preventDefault();
                if (confirm('Bạn có chắc chắn muốn xóa sản phẩm này khỏi giỏ hàng?')) {
                    $(this).closest('form').submit();
                }
            });
        });
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const useNewAddressRadio = document.getElementById('use_new_address');
            const newAddressInput = document.getElementById('new_address_input');

            useNewAddressRadio.addEventListener('change', function() {
                if (this.checked) {
                    newAddressInput.style.display = 'block';
                }
            });

            const useExistingAddressRadio = document.getElementById('use_existing_address');
            useExistingAddressRadio.addEventListener('change', function() {
                if (this.checked) {
                    newAddressInput.style.display = 'none';
                }
            });
        });
    </script>
@endsection
