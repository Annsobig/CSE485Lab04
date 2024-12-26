@extends('app')

@section('title', 'Order Detail')

@section('content')
    <h1>Order Detail</h1>
    <div class="mb-3">
        <strong>Order ID:</strong> {{ $orderDetail->order->id }}
    </div>
    <div class="mb-3">
        <strong>Product:</strong> {{ $orderDetail->product->name }}
    </div>
    <div class="mb-3">
        <strong>Quantity:</strong> {{ $orderDetail->quantity }}
    </div>
    <a href="{{ route('order_details.index') }}" class="btn btn-secondary">Back to List</a>
@endsection
