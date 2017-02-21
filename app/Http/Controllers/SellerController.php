<?php

namespace App\Http\Controllers;

use App\Seller;
use Illuminate\Http\Request;

class SellerController extends Controller
{
    //
    public function index() {
        $sellers = Seller::all();

        return json_encode($sellers);
    }

    public function show($id) {
        $seller = Seller::find($id);

        return json_encode($seller);
    }

    public function create(Request $request) {
        dd($request);
    }
}
