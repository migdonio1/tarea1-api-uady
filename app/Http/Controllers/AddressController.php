<?php

namespace App\Http\Controllers;

use App\Address;
use App\Seller;
use Illuminate\Http\Request;

class AddressController extends Controller
{
    //
    public function create(Request $request, $idSeller) {
        $fields = $request->input();
        $seller = Seller::with('address')->find($idSeller);

        $address = Address::create($fields);

        $seller->address_id = $address->id;
        $seller->save();

        return response()->json($seller);
    }

    public function update (Request $request, $idSeller) {
        $fields = $request->input();
        $address = Address::with('seller')->find($idSeller);

        $address->fill($fields);
        $address->save();

        return response()->json($address);
    }
}
