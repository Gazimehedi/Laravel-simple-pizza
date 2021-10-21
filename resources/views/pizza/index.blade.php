@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
      <div class="col-md-12">
        <div class="card align-item-center">
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a></li>
              <li class="breadcrumb-item active" aria-current="page">Pizza</li>
            </ol>
          </nav>
        </div>
      </div>
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">All Pizza
                  <a href="{{route('pizza.create')}}" class="btn btn-success float-right">Add Pizza</a>
                </div>
                <div class="card-body">
                    @if (session('msg'))
                        <div class="alert alert-success" role="alert">
                            {{ session('msg') }}
                        </div>
                    @endif
                    <table class="table table-striped">
                      <thead>
                        <tr>
                          <th scope="col">#</th>
                          <th scope="col">Image</th>
                          <th scope="col">Name</th>
                          <th scope="col">Description</th>
                          <th scope="col">Category</th>
                          <th scope="col">S.Price</th>
                          <th scope="col">M.Price</th>
                          <th scope="col">L.Price</th>
                          <th scope="col"></th>
                          <th scope="col">Action</th>

                        </tr>
                      </thead>
                      <tbody>
                        @foreach($pizzas as $key=> $pizza)
                        <tr>
                          <th scope="row">{{$key+1}}</th>
                          <td><img src="{{Storage::url($pizza->image)}}" width="80px"></td>
                          <td>{{$pizza->name}}</td>
                          <td>{{$pizza->description}}</td>
                          <td>{{$pizza->category}}</td>
                          <td>${{$pizza->small_price}}</td>
                          <td>${{$pizza->medium_price}}</td>
                          <td>${{$pizza->large_price}}</td>
                          <td><a href="{{route('pizza.edit',$pizza->id)}}" class="btn btn-primary">Edit</a></td>
                          <td><button class="btn btn-danger" data-toggle="modal" data-target="#exampleModal{{$pizza->id}}">Delete</button></td>
                        </tr>
                        <!-- Modal -->
                        <div class="modal fade" id="exampleModal{{$pizza->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                          <div class="modal-dialog" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Delete Confirmation</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>
                              <div class="modal-body">
                                Are you sure?
                              </div>
                              <div class="modal-footer">
                                <form action="{{route('pizza.destroy',$pizza->id)}}" method="post">
                                  @csrf
                                  @method('DELETE')
                                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                  <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                              </div>
                            </div>
                          </div>
                        </div>
                        @endforeach
                      </tbody>
                    </table>
                    {{$pizzas->links()}}
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
