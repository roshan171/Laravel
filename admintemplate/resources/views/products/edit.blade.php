@extends('layouts.app')

@section('title','Edit Product')

@section('contents')
<h1 class="mb-0">Edit Products</h1>
<hr>
<form action="{{route('products.update',$product->id)}}" method="post">
    @csrf
    @method('PUT')
    <div class="row mb-3">
        <div class="col">
            <input type="text" name="title" class="form-control" placeholder="Title" value="{{$product->title}}">
        </div>
        <div class="col">
            <input type="text" name="price" class="form-control" placeholder="Price" value="{{$product->price}}">
        </div>
    </div>

    <div class="row mb-3">
        <div class="col">
            <input type="text" name="product_code" class="form-control" placeholder="Prodct code" value="{{$product->product_code}}">
        </div>
        <div class="col">
<textarea name="description" class="form-control" placeholder="Descriprion">{{$product->description}}"</textarea>
    </div>
    </div>
<div class="row">
    <div class="d-grid">
        <button type="submit" class="btn btn-primary"> Update</button>
    </div>
</div>
</form>

@endsection