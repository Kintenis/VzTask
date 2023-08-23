<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Stock;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index() {
        $query = Product::query();

        if (request('search')) {
            $query->where('description', 'like', '%' . request('search') . '%');
        }

        return view('products', [
            'products' => $query->get()
        ]);
    }

    public function show(Product $product) {
        return view('product', [
            'product' => $product,
            'stocks' => Stock::findBySku($product->getAttributes()['sku'])
        ]);
    }
}
