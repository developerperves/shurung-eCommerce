<?php

namespace App\Http\Controllers;

use App\District;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function checkout()
    {
        if (cart_count() === 0) return redirect('cart')->withErrors('Please select a product 🥺.');
        return view('frontend.checkout', [
            'districts' => District::all(),
        ]);
    }
    public function checkoutstore(Request $request)
    {
        print_r($request->all());
    }
}
