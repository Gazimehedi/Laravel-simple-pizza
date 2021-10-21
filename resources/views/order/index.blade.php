@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
          <div class="card align-item-center">
            <nav aria-label="breadcrumb">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page">Orders</li>
              </ol>
            </nav>
          </div>
        </div>
        <div class="col-md-12">
            <div class="card">
              <div class="card-header">Orders</div>
                <div class="card-body">
                  <table class="table table-striped text-center">
                    <thead>
                      <tr>
                        <th scope="col">User</th>
                        <th scope="col">Phone/Email</th>
                        <th scope="col">Date/Time</th>
                        <th scope="col">Pizza</th>
                        <th scope="col">S. Pizza</th>
                        <th scope="col">M. Pizza</th>
                        <th scope="col">L. Pizza</th>
                        <th scope="col">Total($)</th>
                        <th scope="col">Message</th>
                        <th scope="col">Status</th>
                        <th scope="col">Accept</th>
                        <th scope="col">Reject</th>
                        <th scope="col">Completed</th>

                      </tr>
                    </thead>
                    <tbody>
                      @foreach($orders as $order)
                      <tr>
                        <td>{{$order->user->name}}</td>
                        <td>{{$order->user->email}}<br>{{$order->phone}}</td>
                        <td>{{$order->date." | ".$order->time }}</td>
                        <td>{{$order->pizza->name}}</td>
                        <td>{{$order->small_pizza}}</td>
                        <td>{{$order->medium_pizza}}</td>
                        <td>{{$order->large_pizza}}</td>
                        <td>${{($order->pizza->small_price * $order->small_pizza)+
                          ($order->pizza->medium_price * $order->medium_pizza)+
                          ($order->pizza->large_price * $order->large_pizza)}}</td>
                        <td>{{$order->body}}</td>
                        <td>{{$order->status}}</td>
                        <form action="{{route('order.status',$order->id)}}" method="post">@csrf
                          <td><input class="btn btn-primary btn-sm" name="status" type="submit" value="Accepted"></td>
                          <td><input class="btn btn-danger btn-sm" name="status" type="submit" value="Rejected"></td>
                          <td><input class="btn btn-success btn-sm" name="status" type="submit" value="Completed"></td>
                        </form>
                      </tr>
                      @endforeach
                    </tbody>
                  </table>
                </div>
            </div>
        </div>
    </div>
</div>
<style media="screen">
  .breadcrumb{
    margin-bottom:0px !important;
  }
</style>
@endsection
