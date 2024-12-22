@extends('layouts.app')

@section('title', 'Sửa Độc Giả')

@section('content')
    <h1 class="mb-4">Sửa Độc Giả</h1>

    <form action="{{ route('readers.update', $reader->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="name" class="form-label">Họ tên</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ $reader->name }}" required>
        </div>
        <div class="mb-3">
            <label for="address" class="form-label">Địa chỉ</label>
            <input type="text" name="address" id="address" class="form-control" value="{{ $reader->address }}" required>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" name="email" id="email" class="form-control" value="{{ $reader->email }}" required>
        </div>
        <div class="mb-3">
            <label for="phone" class="form-label">Số điện thoại</label>
            <input type="text" name="phone" id="phone" class="form-control" value="{{ $reader->phone }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Cập Nhật</button>
    </form>
@endsection
