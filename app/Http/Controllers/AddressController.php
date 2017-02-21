<?php

namespace App\Http\Controllers;

use App\Seller;
use Illuminate\Http\Request;

class AddressController extends Controller
{
    //
    public function create(Request $request, $idSeller) {
        $seller = Seller::with('address')->find($idSeller);
        dd($seller);
    }

    public function update (Request $request, $idSeller) {
        $seller = Seller::with('address')->find($idSeller);
        dd($seller);
    }
}
