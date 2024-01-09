@extends('layouts.app')

@section('title','Show Product')

@section('contents')
<h1 class="mb-0">Details Products</h1>
<hr>

    <div class="row ">
        <div class="col mb-3">
            <label  class="form-label">Title</label>
            <input type="text" name="title" class="form-control" placeholder="Title" value="{{$product->title}}" readonly>
        </div>
        <div class="col mb-3">
        <label  class="form-label">Price</label>
            <input type="text" name="price" class="form-control" placeholder="Price" value="{{$product->price}}" readonly>
        </div>
    </div>

    <div class="row ">
        <div class="col mb-3">
            <label class="form-label">Product Code:</label>
            <input type="text" name="product_code" class="form-control" value="{{$product->product_code}}" placeholder="Prodct code" readonly>
        </div>
        <div class="col mb-3">
            <label class="form-label">Descriprion</label>
     <textarea name="description" class="form-control" placeholder="Descriprion" readonly>{{$product->description}}"</textarea>
    </div>
    </div>
    
    <div class="row ">
        <div class="col mb-3">
            <label class="form-label">created at</label>
            <input type="text" name="created_at" class="form-control" value="{{$product->created_at}}" placeholder="created_at" readonly>
        </div>

        <div class="col mb-3">
            <label class="form-label">Updated at</label>
            <input type="text" name="updated_at" class="form-control" value="{{$product->updated_at}}" placeholder="updated_at" readonly>
        </div>


@endsection 