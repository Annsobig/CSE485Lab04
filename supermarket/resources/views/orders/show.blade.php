@extends('app')

@section('title', 'Order Details')

@section('content')
    <h1>Order Details</h1>
    <div class="mb-3">
        <strong>Customer:</strong> {{ $order->customer->name }}
    </div>
    <div class="mb-3">
        <strong>Order Date:</strong> {{ $order->order_date }}
    </div>
    <div class="mb-3">
        <strong>Total Amount:</strong> {{ $order->total_amount }}
    </div>
    <div class="mb-3">
        <strong>Status:</strong> {{ $order->status }}
    </div>
    <a href="{{ route('orders.index') }}" class="btn btn-secondary">Back to List</a>
@endsection
