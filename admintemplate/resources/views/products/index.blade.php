@extends('layouts.app')

@section('title','Home Product')

@section('contents')
<div class="d-flex align-items-center justify-content-between">
<h1 class="mb-0">List Products</h1>
<a href="{{route('products.create')}}" class="btn btn-primary">Add Products</a>
</div>
<hr>
@if(Session::has('success'))
<div class="alert alert-success" role="alert">
{{Session::get('success')}}
</div>
@endif
<table class="table table-horder">
    <thead class="table-primary">
        <tr>
            <th>ID</th>
            <th>Title</th>
            <th>Price</th>
            <th>Product code</th>
            <th>Description</th>
            <th>Action</th>

        </tr>
    </thead>
    <tbody>
        @if($product->count()>0)
        @foreach($product as $res)
        <tr>
            <td class="align-middle">{{$loop->iteration}}</td>
            <td class="align-middle">{{$res->title}}</td>
            <td class="align-middle">{{$res->price}}</td> 
            <td class="align-middle">{{$res->product_code}}</td>
            <td class="align-middle">{{$res->description}}</td>
            <td class="align-middle">
                <div class="btn-group" role="group">
                    <a href="{{route('products.show',$res->id)}}" type="button" class="btn btn-warning">View</a>
                    <a href="{{route('products.edit',$res->id)}}" type="button" class="btn btn-success">Edit</a>
                    <form action="{{route('products.destroy',$res->id)}}" method="post" type="button" onclick="alert('are you Sure to delete..?')">
                        @csrf
                        @method('DELETE')
                    <button class="btn btn-danger m-0">Delete</button>
                    </form>
                </div>
            </td>
        </tr>
        @endforeach
        @else
        <tr>
            <td class="text-center" colspan="5">Product Not found</td>
        </tr>
        @endif
    </tbody>

</table>





@endsection