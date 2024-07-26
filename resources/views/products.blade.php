@extends('layouts.app')
@section('content')
    <!-- Main -->
    <div id="main">
        <div class="sidebar">
            <ul>
                <li>
                    <a href="#">Tất Cả</a>
                </li>
                @foreach ($types as $type)
                    <li>
                        <a href="#{{ $type->id }}">{{ $type->name }}</a>
                    </li>
                @endforeach
            </ul>
        </div>
        <div class="content">
            @foreach ($types as $type)
                <div class="container">
                    <div class="row">
                        <h2 id="{{ $type->id }}">{{ $type->name }}</h2>
                        @foreach ($products as $product)
                            <div class="col-lg-4 col-md-6 col-6">
                                <a href="{{ route('detail',$product->id) }}"><img src="{{ asset('images/products/',$product->image) }}" alt=""></a>
                                <h4><a href="{{ route('detail',$product->id) }}">{{ $product->name }}</a></h4>
                                <p>{{ $product->price_format($product->price) }}</p>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
