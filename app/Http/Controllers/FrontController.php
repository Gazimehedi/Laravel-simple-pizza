<?php

namespace App\Http\Controllers;

use App\Models\{Pizza,Order};
use Illuminate\Http\Request;

class FrontController extends Controller
{
    public function index(Request $request)
    {
      if(!$request->category){
        $pizzas = Pizza::latest()->get();
        return view('index',compact('pizzas'));
      }
      $pizzas = Pizza::where('category',$request->category)->latest()->get();
      return view('index',compact('pizzas'));
    }
    public function show($id)
    {
      $pizza = Pizza::find($id);
      return view('pizza',compact('pizza'));
    }
    public function store(Request $request)
    {
      if($request->small_pizza == 0 && $request->medium_pizza == 0 && $request->large_pizza == 0){
        return back()->with('error','Please order atleast one pizza');
      }
      if($request->small_pizza < 0 || $request->medium_pizza < 0 || $request->large_pizza < 0){
        return back()->with('error','Order should not have negative number');
      }
      Order::create([
        'user_id'=>auth()->user()->id,
        'phone'=>$request->phone,
        'date'=>$request->date,
        'time'=>$request->time,
        'pizza_id'=>$request->pizza_id,
        'small_pizza'=>$request->small_pizza,
        'medium_pizza'=>$request->medium_pizza,
        'large_pizza'=>$request->large_pizza,
        'body'=>$request->message,
      ]);
      return back()->with('msg','Your order is successfull');
    }
    public function my_orders(){
      $orders = Order::where('user_id',auth()->user()->id)->get();
      return view('my_order',compact('orders'));
    }
}
