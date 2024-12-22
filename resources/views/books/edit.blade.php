@extends('layouts.app')

@section('title', 'Sửa Sách')

@section('content')
    <h1 class="mb-4">Sửa Sách</h1>

    <form action="{{ route('books.update', $book->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="name" class="form-label">Tên sách</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ $book->name }}" required>
        </div>
        <div class="mb-3">
            <label for="author" class="form-label">Tác giả</label>
            <input type="text" name="author" id="author" class="form-control" value="{{ $book->author }}" required>
        </div>
        <div class="mb-3">
            <label for="category" class="form-label">Thể loại</label>
            <input type="text" name="category" id="category" class="form-control" value="{{ $book->category }}" required>
        </div>
        <div class="mb-3">
            <label for="year" class="form-label">Năm xuất bản</label>
            <input type="number" name="year" id="year" class="form-control" value="{{ $book->year }}" required>
        </div>
        <div class="mb-3">
            <label for="quantity" class="form-label">Số lượng</label>
            <input type="number" name="quantity" id="quantity" class="form-control" value="{{ $book->quantity }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Cập Nhật</button>
    </form>
@endsection
