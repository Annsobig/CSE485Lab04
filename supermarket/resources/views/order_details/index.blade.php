@extends('app')

@section('title', 'Order Details')

@section('content')
    <h1>Order Detail List</h1>
    <a href="{{ route('order_details.create') }}" class="btn btn-primary mb-3">Add New Order Detail</a>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>#</th>
                <th>Order</th>
                <th>Product</th>
                <th>Quantity</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($orderDetails as $orderDetail)
                <tr>
                    <td>{{ $orderDetail->id }}</td>
                    <td>{{ $orderDetail->order->id }}</td>
                    <td>{{ $orderDetail->product->name }}</td>
                    <td>{{ $orderDetail->quantity }}</td>
                    <td>
                        <a href="{{ route('order_details.show', $orderDetail->id) }}" class="btn btn-sm btn-info">View</a>
                        <a href="{{ route('order_details.edit', $orderDetail->id) }}" class="btn btn-sm btn-warning">Edit</a>
                        <form action="{{ route('order_details.destroy', $orderDetail->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <!-- Pagination links -->
    {{ $orderDetails->links() }}
@endsection
