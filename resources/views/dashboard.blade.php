@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
      <div class="col-md-4">
          <div class="card">
              <div class="card-header">Menu</div>
              <div class="card-body">
                  <ul class="list-group">
                      <a href="{{route('customers')}}" class="list-group-item list-group-item-action">Customers</a>
                      <a href="{{route('order.index')}}" class="list-group-item list-group-item-action">Orders</a>
                      <a href="{{route('pizza.index')}}" class="list-group-item list-group-item-action">Pizzas</a>
                  </ul>
              </div>
          </div>
      </div>
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="row">
                      <div class="col-md-4">
                        <div class="card">
                          <div class="card-header">Total Orders</div>
                          <div class="card-body text-center">
                            <h1>{{$orders}}</h1>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="card">
                          <div class="card-header">Total Product</div>
                          <div class="card-body text-center">
                            <h1>{{$pizzas}}</h1>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="card">
                          <div class="card-header">Total Users</div>
                          <div class="card-body text-center">
                            <h1>{{$users}}</h1>
                          </div>
                        </div>
                      </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
