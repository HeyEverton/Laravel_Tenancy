<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Store;
use Illuminate\Http\Request;
use App\Services\CartService;

class StoreController extends Controller
{
    public function index($subdomain, Store $store, CartService $c)
    {
        
        $store = $store->whereSubdomain($subdomain)->with('products')->firstOrFail();

        return view('front.home', compact('store'));
    }
}
