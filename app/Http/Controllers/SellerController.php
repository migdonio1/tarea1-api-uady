<?php

namespace App\Http\Controllers;

use App\Seller;
use Illuminate\Http\Request;

class SellerController extends Controller
{
    //
    public function index() {
        $sellers = Seller::with('address')->get();

        return response()->json($sellers);
    }

    public function show($id) {
        $seller = Seller::with('address')->find($id);

        return response()->json($seller);
    }

    public function create(Request $request) {
        $input = $request->input();
        $newSeller = Seller::create($input);

        return response()->json($newSeller);
    }

    public function update(Request $request, $id) {
        $updateSeller = Seller::with('address')->find($id);
        $fields =  $request->input();

        $updateSeller->fill($fields);
        $updateSeller->save();

        return $request->json($updateSeller);
    }

    public function edit(Request $request, $id) {
        $updateSeller = Seller::with('address')->find($id);
        $fields = $request->input();

        $updateSeller->fill($fields);
        $updateSeller->save();

        return $request->json($updateSeller);
    }
}
