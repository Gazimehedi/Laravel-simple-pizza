@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
      <div class="col-md-4">
          <div class="card">
              <div class="card-header text-center">Make Order</div>
              <div class="card-body">
                @if(Auth::check())
                <form action="{{route('order.store')}}" method="post">@csrf
                  <label>Name</label>
                  <strong><p>{{Auth::user()->name}}</p></strong>
                  <label>Email</label>
                  <strong><p>{{Auth::user()->email}}</p></strong>
                <div class="form-group">
                  <label for="phone">Phone</label>
                  <input type="number" name="phone" class="form-control" required>
                </div>
                <div class="form-group">
                  <label for="small_pizza">Small Pizza Order</label>
                  <input type="number" name="small_pizza" class="form-control" value="0" required>
                </div>
                <div class="form-group">
                  <label for="medium_pizza">Medium Pizza Order</label>
                  <input type="number" name="medium_pizza" class="form-control" value="0" required>
                </div>
                <div class="form-group">
                  <label for="large_pizza">Large Pizza Order</label>
                  <input type="number" name="large_pizza" class="form-control" value="0" required>
                </div>
                <div class="form-group">
                  <label for="date">Date</label>
                  <input type="date" name="date" class="form-control" required>
                </div>
                <div class="form-group">
                  <label for="time">Time</label>
                  <input type="time" name="time" class="form-control" required>
                </div>
                <div class="form-group">
                  <label for="message">Message</label>
                  <textarea type="text" name="message" class="form-control" required></textarea>
                </div>
                <div class="form-group text-center">
                  <input type="hidden" name="pizza_id" value="{{$pizza->id}}">
                  <input type="submit" class="btn btn-danger" value="Make Order">
                </div>
              </form>
                @else
                <a href="/login">Login to make the order</a>
                @endif
                @if (session('error'))
                    <div class="alert alert-danger" role="alert">
                        {{ session('error') }}
                    </div>
                @endif
                @if (session('msg'))
                    <div class="alert alert-success" role="alert">
                        {{ session('msg') }}
                    </div>
                @endif
              </div>
          </div>
      </div>
        <div class="col-md-8">
            <div class="card">
                <div class="card-header text-center">Pizza Details</div>
                <div class="card-body detail">
                  <img src="{{Storage::url($pizza->image)}}" alt="{{$pizza->name}}" class="img-thumbnail d-block" style="width:100%">
                  <br>
                  <h3>{{$pizza->name}}</h3>
                  <h4>{{$pizza->description}}</h4>
                  <br>
                  <p>Small Pizza Price: <strong>${{$pizza->small_price}}</strong></p>
                  <p>Medium Pizza Price: <strong>${{$pizza->medium_price}}</strong></p>
                  <p>Large Pizza Price: <strong>${{$pizza->large_price}}</strong></p>
                  <p>Category: <strong>{{$pizza->category}}</strong></p>
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
  .detail p{
    font-size: 16px;
  }
</style>
@endsection
