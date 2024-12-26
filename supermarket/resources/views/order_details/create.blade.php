@extends('app')

@section('title', 'Add Order Detail')

@section('content')
    <h1>Add New Order Detail</h1>
    <form action="{{ route('order_details.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="order_id" class="form-label">Order</label>
            <select name="order_id" id="order_id" class="form-control" required>
                <option value="">Select an Order</option>
                @foreach ($orders as $order)
                    <option value="{{ $order->id }}">{{ $order->id }} - {{ $order->customer->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="product_id" class="form-label">Product</label>
            <select name="product_id" id="product_id" class="form-control" required>
                <option value="">Select a Product</option>
                @foreach ($products as $product)
                    <option value="{{ $product->id }}">{{ $product->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="quantity" class="form-label">Quantity</label>
            <input type="number" name="quantity" id="quantity" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Add Order Detail</button>
    </form>
@endsection
