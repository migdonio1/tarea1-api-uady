<?php

namespace App\Http\Controllers;

use App\Product;
use App\Review;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    //
    public function create(Request $request, $id) {
        $fields = $request->input();
        $product = Product::with('reviews', 'tags', 'user')->find($id);

        $review = Review::create($fields);

        $review->product_id = $review->id;
        $review->save();

        dd($product);
        return response()->json($review);
    }

    public function index(Request $request, $id) {
        $product = Product::with('reviews')->find($id);

        return response()->json($product->reviews);
    }

    public function delete(Request $request, $productId, $reviewId) {
        $review = Review::find($reviewId);
        $review->delete();

        return response()->json($review);
    }
}
