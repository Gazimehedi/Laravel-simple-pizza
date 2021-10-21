<?php

use App\Http\Controllers\PizzaController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\FrontController;
use Illuminate\Support\Facades\Route;


Auth::routes();
Route::group(['prefix'=>'admin','middleware'=>['auth','admin']],function(){
  Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('dashboard');
  Route::get('pizza',[PizzaController::class,'index'])->name('pizza.index');
  Route::get('pizza/create',[PizzaController::class,'create'])->name('pizza.create');
  Route::post('pizza/store',[PizzaController::class,'store'])->name('pizza.store');
  Route::get('pizza/{id}/edit',[PizzaController::class,'edit'])->name('pizza.edit');
  Route::put('pizza/{id}/update',[PizzaController::class,'update'])->name('pizza.update');
  Route::delete('pizza/{id}/delete',[PizzaController::class,'destroy'])->name('pizza.destroy');

  //order Route
  Route::get('user/order',[OrderController::class,'index'])->name('order.index');
  Route::post('user/{id}/status',[OrderController::class,'updateStatus'])->name('order.status');
  Route::get('customers',[OrderController::class,'customers'])->name('customers');
});
Route::get('/',[FrontController::class,'index'])->name('home');
Route::get('/my-orders',[FrontController::class,'my_orders'])->name('orders');
Route::get('/pizza/{id}',[FrontController::class,'show'])->name('pizza.show');
Route::post('/order/store',[FrontController::class,'store'])->name('order.store');
