<?php

namespace App\Http\Controllers;

use App\Models\{User,Pizza,Order};
use Illuminate\Http\Request;

class HomeController extends Controller
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

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
      if(auth()->user()->is_admin == 1){
        $users = count(User::all());
        $pizzas = count(Pizza::all());
        $orders = count(Order::all());
        return view('dashboard',compact('users','pizzas','orders'));
      }
        return redirect()->route('home');
    }
}
