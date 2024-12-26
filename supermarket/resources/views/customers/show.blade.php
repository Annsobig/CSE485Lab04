@extends('app')

@section('title', 'Customer Details')

@section('content')
    <h1>Customer Details</h1>
    <div class="mb-3">
        <strong>Name:</strong> {{ $customer->name }}
    </div>
    <div class="mb-3">
        <strong>Email:</strong> {{ $customer->email }}
    </div>
    <div class="mb-3">
        <strong>Phone:</strong> {{ $customer->phone }}
    </div>
    <div class="mb-3">
        <strong>Address:</strong> {{ $customer->address }}
    </div>
    <a href="{{ route('customers.index') }}" class="btn btn-secondary">Back to List</a>
@endsection
