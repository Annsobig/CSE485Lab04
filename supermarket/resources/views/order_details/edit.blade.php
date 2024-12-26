@extends('app')

@section('title', 'Edit Order Detail')

@section('content')
    <h1>Edit Order Detail</h1>
    <form action="{{ route('order_details.update', $orderDetail->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="order_id" class="form-label">Order</label>
            <select name="order_id" id="order_id" class="form-control" required>
                @foreach ($orders as $order)
                    <option value="{{ $order->id }}" {{ $order->id == $orderDetail->order_id ? 'selected' : '' }}>
                        {{ $order->id }} - {{ $order->customer->name }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="product_id" class="form-label">Product</label>
            <select name="product_id" id="product_id" class="form-control" required>
                @foreach ($products as $product)
                    <option value="{{ $product->id }}" {{ $product->id == $orderDetail->product_id ? 'selected' : '' }}>
                        {{ $product->name }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="quantity" class="form-label">Quantity</label>
            <input type="number" name="quantity" id="quantity" class="form-control" value="{{ $orderDetail->quantity }}" required>
        </div>
        <button type="submit" class="btn btn-warning">Update Order Detail</button>
    </form>
@endsection
