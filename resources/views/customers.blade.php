@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
          <div class="card align-item-center">
            <nav aria-label="breadcrumb">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page">Customers</li>
              </ol>
            </nav>
          </div>
        </div>
        <div class="col-md-12">
            <div class="card">
              <div class="card-header">Customers</div>
                <div class="card-body">
                  <table class="table table-striped">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Member Since</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach($customers as $customer)
                      <tr>
                        <th>{{$customer->id}}</th>
                        <td>{{$customer->name}}</td>
                        <td>{{$customer->email}}</td>
                        <td>{{ \Carbon\Carbon::parse($customer->created_at)->format('d M Y') }}</td>
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
