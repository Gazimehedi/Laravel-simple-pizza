<?php

namespace App\Http\Controllers;

use App\Http\Requests\pizzaStoreRequest;
use App\Http\Requests\pizzaUpdateRequest;
use Illuminate\Http\Request;
use App\Models\Pizza;

class PizzaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $pizzas = Pizza::paginate(5);
        return view('pizza.index',compact('pizzas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pizza.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(pizzaStoreRequest $request)
    {
      $path = $request->image->store('public/pizza');
      Pizza::create([
        'name'=>$request->name,
        'description'=>$request->description,
        'small_price'=>$request->small_price,
        'medium_price'=>$request->medium_price,
        'large_price'=>$request->large_price,
        'category'=>$request->category,
        'image'=>$path,
      ]);
      return redirect()->route('pizza.index')->with('msg','Pizza added successfully');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pizza = Pizza::find($id);
        return view('pizza.edit',compact('pizza'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(pizzaUpdateRequest $request, $id)
    {
        $pizza = Pizza::find($id);
        if($request->image){
          $path = $request->image->store('public/pizza');
        }else{
          $path = $pizza->image;
        }
        $pizza->name = $request->name;
        $pizza->description = $request->description;
        $pizza->small_price = $request->small_price;
        $pizza->medium_price = $request->medium_price;
        $pizza->large_price = $request->large_price;
        $pizza->large_price = $request->large_price;
        $pizza->category = $request->category;
        $pizza->image = $path;
        $pizza->save();
        return redirect()->route('pizza.index')->with('msg','Pizza update successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Pizza::find($id)->delete();
        return redirect()->route('pizza.index')->with('msg','Pizza delete successfully');
    }
}
