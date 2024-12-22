@extends('layouts.app')

@section('title', 'Thêm Sách Mới')

@section('content')
    <h1 class="mb-4">Thêm Sách Mới</h1>

    <form action="{{ route('books.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Tên sách</label>
            <input type="text" name="name" id="name" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="author" class="form-label">Tác giả</label>
            <input type="text" name="author" id="author" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="category" class="form-label">Thể loại</label>
            <input type="text" name="category" id="category" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="year" class="form-label">Năm xuất bản</label>
            <input type="number" name="year" id="year" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="quantity" class="form-label">Số lượng</label>
            <input type="number" name="quantity" id="quantity" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Thêm Sách</button>
    </form>
@endsection
