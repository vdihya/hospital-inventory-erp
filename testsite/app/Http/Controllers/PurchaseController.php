<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PurchaseOrder;
class PurchaseController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
    }
    public function show()
    {

        return view('purchaseform');
    }
    public function store()
    {
        $order = new PurchaseOrder;
        
        $order->ordno = request('ordno');
        $order->date = request('date');
        $order->bolno = request('bolno');
        $order->invoiceno = request('invoiceno');
        $order->customer = request('customer');
        $order->distributor = request('distributor');
        $order->soldto = request('soldto');
        $order->type = request('type');
        $order->save();

        return view('purchasedetails');

    }
}
