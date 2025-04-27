@extends('layouts.master')
@section('title', 'Prime Numbers')
@section('content')

<form action="{{route('products_save', $product->id)}}" method="post">
{{ csrf_field() }}
    {{ csrf_field() }}
    @foreach($errors->all() as $error)
    <div class="alert alert-danger">
    <strong>Error!</strong> {{$error}}
    </div>
    @endforeach
 
    <div class="row mb-2">
        <div class="col-6">
            <label for="model" class="form-label">Discount:</label>
            <input type="numeric" class="form-control" placeholder="Discount" name="Discount" required value="{{$product->Discount}}">
        </div>
       
        <div class="mb-3">
            <label for="stock" class="form-label">Stock</label>
            <input type="number" class="form-control" id="stock" name="stock" value="{{ old('stock', $product->stock ?? 0) }}">
        </div>
    </div>
 
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>
@endsection
