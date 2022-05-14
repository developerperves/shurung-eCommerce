<?php

namespace App\Http\Controllers;

use App\Order;
use App\Orderdetails;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('checkrole');
    }
    public function orderindex() {
        return view('admin.order.index', [
            'orders' => Order::latest()->get(),
        ]);
    }
    public function ordershow($id) {
        $transaction_id = Order::find($id)->transaction_id;
        Order::find($id)->update([
            'view' => 2
        ]);
        return view('admin.order.show', [
            'order' => Order::find($id),
            'orders' => Orderdetails::where('order_id',$transaction_id)->get()
        ]);
    }
    public function orderdone (Request $request, $id) {
        Order::find($id)->update([
            'status' => 'done'
        ]);
        return back()->with('delivery_done', 'Delivery done!');
    }
}
