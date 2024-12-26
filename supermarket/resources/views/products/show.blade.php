@extends('app')

@section('title', 'Product Details')

@section('content')
    <h1>Product Details</h1>
    <div class="mb-3">
        <strong>Name:</strong> {{ $product->name }}
    </div>
    <div class="mb-3">
        <strong>Description:</strong> {{ $product->description }}
    </div>
    <div class="mb-3">
        <strong>Price:</strong> {{ $product->price }}
    </div>
    <div class="mb-3">
        <strong>Stock:</strong> {{ $product->stock }}
    </div>
    <a href="{{ route('products.index') }}" class="btn btn-secondary">Back to List</a>
@endsection
