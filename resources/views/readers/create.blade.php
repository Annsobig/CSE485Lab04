@extends('layouts.app')

@section('title', 'Thêm Độc Giả Mới')

@section('content')
    <h1 class="mb-4">Thêm Độc Giả Mới</h1>

    <form action="{{ route('readers.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Họ tên</label>
            <input type="text" name="name" id="name" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="address" class="form-label">Địa chỉ</label>
            <input type="text" name="address" id="address" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" name="email" id="email" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="phone" class="form-label">Số điện thoại</label>
            <input type="text" name="phone" id="phone" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Thêm Độc Giả</button>
    </form>
@endsection
