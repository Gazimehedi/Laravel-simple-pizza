@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
      <div class="col-md-4">
          <div class="card">
              <div class="card-header">Menu</div>
              <div class="card-body">
                <div class="list-group">
                  <form action="{{route('home')}}" method="get">
                    <input type="submit" name="show" value="All Pizzas" class="list-group-item list-group-item-action">
                    <input type="submit" name="category" value="Vegetarian" class="list-group-item list-group-item-action">
                    <input type="submit" name="category" value="Non-Vegetarian" class="list-group-item list-group-item-action">
                    <input type="submit" name="category" value="Traditional" class="list-group-item list-group-item-action">
                  </form>
                </div>
              </div>
          </div>
      </div>
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Pizza ({{count($pizzas)}} pizza)</div>
                <div class="card-body">
                  <div class="row">
                    @forelse($pizzas as $pizza)
                    <div class="col-md-4" style="border:1px solid #ccc;">
                      <img src="{{Storage::url($pizza->image)}}" alt="{{$pizza->name}}" class="img-thumbnail d-block" style="width:100%">
                      <br>
                      <h4 class="font-weight-bold">{{$pizza->name}}</h4>
                      <p style="font-size:16px;text-align:justify">{{$pizza->description}}</p>
                      <p class="text-center"><a href="{{route('pizza.show',$pizza->id)}}" class="btn btn-danger mb-2">Order Now</a></p>
                    </div>
                    @empty
                    <p>No Pizza To Show</p>
                    @endforelse
                  </div>
                </div>
            </div>
        </div>
    </div>
</div>
<style media="screen">
  .card-header{
    background: red;
    color:#fff;
    font-size: 20px;
  }
  .list-group-item{
    font-size: 18px;
  }
  .list-group-item:hover{
    background: red !important;
    color:#fff !important;
  }
</style>
@endsection
