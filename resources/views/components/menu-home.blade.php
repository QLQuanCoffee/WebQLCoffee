<div id="menu_home">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-12 col-12">
                <a href="#">
                    <img src="{{ asset('images/products/sale.webp') }}" alt="">
                </a>
            </div>
            @if($products)
                @foreach ($products as $product)
                    <div class="col-lg-3 col-md-6 col-6">
                        <a href="{{ route('detail', $product->id) }}">
                            <img src="{{ asset('images/products/'. $product->photo) }}" alt="">
                        </a>
                        <h4>
                            <a href="{{ route('detail', $product->id) }}">{{ $product->name }}</a>
                        </h4>
                        <p>{{ $product->price_format($product->price) }}</p>
                    </div>
                @endforeach
            @endif
        </div>
    </div>
</div>
