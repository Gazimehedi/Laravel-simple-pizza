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
              <li class="breadcrumb-item active" aria-current="page">Create</li>
            </ol>
          </nav>
        </div>
      </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">Menu</div>
                <div class="card-body">
                    <ul class="list-group">
                        <a href="{{route('pizza.index')}}" class="list-group-item list-group-item-action">View</a>
                        <a href="{{route('pizza.create')}}" class="list-group-item list-group-item-action">Create</a>
                    </ul>
                </div>
            </div>
            @if(count($errors)>0)
            <div class="card mt-5">
                <div class="card-body">
                  <div class="alert alert-danger">
                    @foreach($errors->all() as $error)
                      <p>{{$error}}</p>
                    @endforeach
                  </div>
                </div>
            </div>
          @endif
        </div>
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Pizza</div>
                <div class="card-body">
                    <form action="{{route('pizza.store')}}" method="post" enctype="multipart/form-data">
                      @csrf
                        <div class="form-group">
                            <label for="name">Name of Pizza</label>
                            <input type="text" name="name" class="form-control" placeholder="Name Of Pizza">
                        </div>
                        <div class="form-group">
                            <label for="name">Description of Pizza</label>
                            <textarea type="text" name="description" class="form-control" placeholder="Name Of Pizza"></textarea>
                        </div>
                        <div class="form-inline">
                            <label>Pizza Price($)</label>
                            <input type="number" name="small_price" class="form-control" placeholder="small pizza price">
                            <input type="number" name="medium_price" class="form-control" placeholder="medium pizza price">
                            <input type="number" name="large_price" class="form-control" placeholder="large pizza price">
                        </div>
                        <div class="form-group">
                            <label for="name">Category</label>
                            <select name="category" class="form-control">
                                <option>Select Category</option>
                                <option value="Vegetarian">Vegetarian Pizza</option>
                                <option value="Non-Vegetarian">Non-Vegetarian Pizza</option>
                                <option value="Traditional">Traditional Pizza</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="image">Image</label>
                            <input type="file" name="image" class="form-control">
                        </div>
                        <div class="form-group text-center">
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                    </form>
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
