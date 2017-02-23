<?php

namespace App\Http\Controllers;

use App\Product;
use App\Tag;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    //
    public function index() {
        $products = Product::with('seller', 'tags')->get();

        dd($products);
        return response()->json($products);
    }

    public function show($id) {
        $product = Product::with('seller', 'tags')->find($id);

        return response()->json($product);
    }

    public function create(Request $request) {
        $productData = $request->input('product');
        $tagsData = $request->input('tags');
        $tags = [];

        foreach ($tagsData as $tagData) {
            $tag = Tag::firstOrCreate($tagData);
            array_push($tags, $tag);
        }

        $tags = Collection::make($tags);

        dd($tags);

        $product  = Product::create($productData);
        $product->tags()->saveMany($tags);

        return response()->json($product);
    }

    public function update(Request $request, $id) {
        $product = Product::with('seller', 'tags')->find($id);
        $productData = $request->input('product');
        $tagsData = $request->input('tags');
        $tags = [];

        foreach ($tagsData as $tagData) {
            $tag = Tag::firstOrCreate($tagData);
            array_push($tags, $tag);
        }


        $product->fill($productData);
        $product->save();

        $product->saveMany($tags);

        return response()->json($product);
    }

    public function edit(Request $request, $id) {
        $product = Product::with('seller', 'tags')->find($id);
        $fields =  $request->input();

        $product->fill($fields);
        $product->save();

        return response()->json($product);
    }

    public function delete(Request $request, $id) {
        $product = Product::find($id);
        $product->delete();

        return response()->json($product);
    }
}
