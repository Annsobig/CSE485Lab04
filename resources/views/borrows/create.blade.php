@extends('layouts.app')

@section('title', 'Thêm Mượn Sách Mới')

@section('content')
    <h1 class="mb-4">Thêm Mượn Sách Mới</h1>

    <form action="{{ route('borrows.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="reader_id" class="form-label">Độc giả</label>
            <select name="reader_id" id="reader_id" class="form-control" required>
                <option value="">Chọn Độc giả</option>
                @foreach ($readers as $reader)
                    <option value="{{ $reader->id }}">{{ $reader->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="book_id" class="form-label">Sách</label>
            <select name="book_id" id="book_id" class="form-control" required>
                <option value="">Chọn Sách</option>
                @foreach ($books as $book)
                    <option value="{{ $book->id }}">{{ $book->title }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="borrow_date" class="form-label">Ngày mượn</label>
            <input type="date" name="borrow_date" id="borrow_date" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="return_date" class="form-label">Ngày trả</label>
            <input type="date" name="return_date" id="return_date" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-primary">Thêm Mượn Sách</button>
    </form>
@endsection
