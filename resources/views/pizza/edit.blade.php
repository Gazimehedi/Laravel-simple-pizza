@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
      <div class="col-md-8">
        <div class="card align-item-center">
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a></li>
              <li class="breadcrumb-item active" aria-current="page">Pizza</li>
              <li class="breadcrumb-item active" aria-current="page">Edit</li>
            </ol>
          </nav>
        </div>
      </div>
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Edit Pizza</div>
                  @if(count($errors)>0)
                    <div class="alert alert-danger">
                      @foreach($errors->all() as $error)
                        <p>{{$error}}</p>
                      @endforeach
                    </div>
                  @endif
                <div class="card-body">
                    <form action="{{route('pizza.update',$pizza->id)}}" method="post" enctype="multipart/form-data">
                      @csrf
                      @method('PUT')
                        <div class="form-group">
                            <label for="name">Name of Pizza</label>
                            <input type="text" name="name" class="form-control" value="{{$pizza->name}}">
                        </div>
                        <div class="form-group">
                            <label for="name">Description of Pizza</label>
                            <textarea type="text" name="description" class="form-control">{{$pizza->description}}</textarea>
                        </div>
                        <div class="form-inline">
                            <label>Pizza Price($)</label>
                            <input type="text" name="small_price" class="form-control" value="{{$pizza->small_price}}">
                            <input type="text" name="medium_price" class="form-control" value="{{$pizza->medium_price}}">
                            <input type="text" name="large_price" class="form-control" value="{{$pizza->large_price}}">
                        </div>
                        <div class="form-group">
                            <label for="name">Category</label>
                            <select name="category" class="form-control">
                                <option value="">Select Category</option>
                                <option value="Vegetarian">Vegetarian Pizza</option>
                                <option value="Non-Vegetarian">Non-Vegetarian Pizza</option>
                                <option value="Traditional">Traditional Pizza</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="image">Image</label>
                            <input type="file" name="image" class="form-control">
                            <img src="{{Storage::url($pizza->image)}}" width="80">
                        </div>
                        <div class="form-group text-center">
                            <button type="submit" class="btn btn-primary">Update</button>
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
