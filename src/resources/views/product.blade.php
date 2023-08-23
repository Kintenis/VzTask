@extends('layout')

@section('content')

<div class="container">
    <div class="row text-center">
        <div class="col-md-12">
            <div class="title-container">
                <div class="border-separate"></div>
                <h1 class="title-text">{{ $product['description'] }}</h1>
                <div class="border-separate"></div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-4">
            <div class="product-container">
                <img class="img-fluid" src="{{ $product['photo'] }}" width="400" height="400" alt="Product image.">
            </div>
        </div>
        <div class="col-md-8">
            <div class="product-container">
                <h1 class="product-title">{{ $product['description'] }}</h1>
                <h2 class="product-sku">{{ $product['sku'] }}</h2>
                <h2 class="product-size">Size: {{ $product['size'] }}</h2>

                <h2 class="product-stocks-title text-center">Stocks</h2>

                @unless(count($stocks) === 0)
                <table class="table table-hover table-dark text-center">
                    <thead>
                    <tr>
                        @foreach($stocks as $stock)
                        <th>{{ $stock['city'] }}</th>
                        @endforeach
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        @foreach($stocks as $stock)
                            <th>{{ $stock['stock'] }}</th>
                        @endforeach
                    </tr>
                    </tbody>
                </table>
                @else
                    <h1 class="not-in-stock">This product is not in stock.</h1>
                @endunless
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <a href="/" class="btn btn-primary">Go to homepage</a>
        </div>
    </div>
</div>

@endsection
