<?php

namespace App\Http\Controllers;

use App\Models\{Order,User};
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = Order::orderBy('id','DESC')->get();
        return view('order.index',compact('orders'));
    }
    public function updateStatus(Request $request,$id)
    {
        $order = Order::find($id);
        $order->status = $request->status;
        $order->save();
        return redirect()->route('order.index');
    }
    public function customers()
    {
        $customers = User::where('is_admin',0)->get();
        return view('customers',compact('customers'));
    }
}
