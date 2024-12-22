@extends('layouts.app')

@section('content')
<div class="container">
        <h2>Danh sách khách hàng</h2>
        <a href="{{ route('customers.create') }}" class="btn btn-primary">Thêm mới khách hàng</a>

        <table class="table">
            <thead>
                <tr>
                    <th>Họ tên</th>
                    <th>Địa chỉ</th>
                    <th>Số điện thoại</th>
                    <th>Email</th>
                    <th>Thao tác</th>
                </tr>
            </thead>
            <tbody>
@foreach ($customers as $customer)
                    <tr>
                        <td>{{ $customer->name }}</td>
                        <td>{{ $customer->address }}</td>
                        <td>{{ $customer->phone }}</td>
                        <td>{{ $customer->email }}</td>
                        <td>
                            <a href="{{ route('customers.edit', $customer->id) }}" class="btn btn-warning">Chỉnh sửa</a>
                            <form action="{{ route('customers.destroy', $customer->id) }}" method="POST" style="display:inline;">
    @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Xóa</button>
                            </form>
                        </td>
                    </tr>
@endforeach
            </tbody>
        </table>
    </div>
@endsection
