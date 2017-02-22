<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    //
    public function index() {
        $products = Product::with('seller', 'tags')->get();

        return response()->json($products);
    }

    public function show($id) {
        $product = Product::with('seller', 'tags')->find($id);

        return response()->json($product);
    }

    public function create(Request $request) {

    }

    public function update(Request $request, $id) {

    }

    public function edit(Request $request, $id) {

    }

    public function delete(Request $request, $id) {

    }
}
