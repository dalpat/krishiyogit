<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $carts = Cart::with('crop')->where('vendor_id', Auth::user()->id)->get();
        return view('carts.index',compact('carts'));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $cart = Cart::where('vendor_id',Auth::user()->id)->where('crop_id',$request->crop_id)->first();
        if($cart){
            return redirect()->back()->withError('Already in cart');
        }

        $data = $request->all();
        $data['vendor_id'] = Auth::user()->id;
        Cart::create($data);
        return redirect()->back()->withSuccess('Cart updated');
    }
}
