<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSeller;
use App\Http\Requests\StoreSellerPost;
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

    public function create(StoreSeller $request) {
        $input = $request->input();
        $newSeller = Seller::create($input);

        return response()->json($newSeller);
    }

    public function update(StoreSeller $request, $id) {
        $updateSeller = Seller::with('address')->find($id);
        $fields =  $request->input();

        $updateSeller->fill($fields);
        $updateSeller->save();

        return response()->json($updateSeller);
    }

    public function edit(Request $request, $id) {
        $updateSeller = Seller::with('address')->find($id);
        $fields = $request->input();

        $updateSeller->fill($fields);
        $updateSeller->save();

        return response()->json($updateSeller);
    }

    public function delete($id) {
        $removeSeller = Seller::find($id);

        $removeSeller->delete();

        return response()->json($removeSeller);
    }
}
