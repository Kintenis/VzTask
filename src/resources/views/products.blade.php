@extends('layout')

@section('content')

@unless(count($products) === 0)

<div class="container">
    <div class="row text-center">
        <div class="col-md-12">
            <div class="title-container">
                <div class="border-separate"></div>
                <h1 class="title-text">Products</h1>
                <div class="border-separate"></div>
            </div>
        </div>
    </div>

    <div class="row text-center">
        <div class="col-md-12">
            <form action="/">
                <div class="main-search-input-wrap">
                    <div class="main-search-input float-left-wrap">
                        <div class="main-search-input-item">
                            <input type="text" name="search" placeholder="Search Products...">
                        </div>

                        <button class="main-search-button">Search</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <div class="row text-center">
        @foreach($products as $product)
        <div class="col-md-3">
            <div class="product-container">
                <div class="card bg-dark">
                    <img class="card-img-top" src="{{ $product['photo'] }}" width="200" height="200" alt="Product image.">
                    <div class="card-body">
                        <h5 class="card-title">{{ $product['description'] }}</h5>
                        <a href="/products/{{ $product['sku'] }}" class="btn btn-primary">Learn more</a>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>

@else
    <div class="container">
        <div class="row text-center">
            <div class="col-md-12">
                <div class="title-container">
                    <div class="border-separate"></div>
                    <h1 class="title-text">No products were found</h1>
                    <div class="border-separate"></div>
                </div>
            </div>
        </div>
    </div>
@endunless

@endsection
