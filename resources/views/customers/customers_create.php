@extends('layouts.app')

@section('content')
<div class="container">
        <h2>Thêm mới khách hàng</h2>

        <form action="{{ route('customers.store') }}" method="POST">
    @csrf
            <div class="form-group">
                <label for="name">Họ tên</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>
            <div class="form-group">
                <label for="address">Địa chỉ</label>
                <input type="text" class="form-control" id="address" name="address" required>
            </div>
            <div class="form-group">
                <label for="phone">Số điện thoại</label>
                <input type="text" class="form-control" id="phone" name="phone" required>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>
            <button type="submit" class="btn btn-success">Thêm khách hàng</button>
        </form>
    </div>
@endsection

