<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Product;

class ProductsController extends Controller
{
    public function getAllProducts() {
        $products = Product::all();

        if ($products->count() > 0) {
            return response()->json([
                'status' => 200,
                'products' => $products
            ], 200);
        }

        return response()->json([
            'status' => 404,
            'products' => 'No records were found!'
        ], 404);
    }
}
