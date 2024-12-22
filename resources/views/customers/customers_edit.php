@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Chỉnh sửa thông tin khách hàng</h2>

    <form action="{{ route('customers.update', $customer->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="name">Họ tên</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ $customer->name }}" required>
        </div>
        <div class="form-group">
            <label for="address">Địa chỉ</label>
            <input type="text" class="form-control" id="address" name="address" value="{{ $customer->address }}" required>
        </div>
        <div class="form-group">
            <label for="phone">Số điện thoại</label>
            <input type="text" class="form-control" id="phone" name="phone" value="{{ $customer->phone }}" required>
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control" id="email" name="email" value="{{ $customer->email }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Cập nhật khách hàng</button>
    </form>
</div>
@endsection

