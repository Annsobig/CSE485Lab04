@extends('layouts.app')

@section('title', 'Sửa Mượn Sách')

@section('content')
    <h1 class="mb-4">Sửa Mượn Sách</h1>

    <form action="{{ route('borrows.update', $borrow->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="reader_id" class="form-label">Độc giả</label>
            <select name="reader_id" id="reader_id" class="form-control" required>
                <option value="">Chọn Độc giả</option>
                @foreach ($readers as $reader)
                    <option value="{{ $reader->id }}" {{ $reader->id == $borrow->reader_id ? 'selected' : '' }}>{{ $reader->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="book_id" class="form-label">Sách</label>
            <select name="book_id" id="book_id" class="form-control" required>
                <option value="">Chọn Sách</option>
                @foreach ($books as $book)
                    <option value="{{ $book->id }}" {{ $book->id == $borrow->book_id ? 'selected' : '' }}>{{ $book->title }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="borrow_date" class="form-label">Ngày mượn</label>
            <input type="date" name="borrow_date" id="borrow_date" class="form-control" value="{{ $borrow->borrow_date }}" required>
        </div>

        <div class="mb-3">
            <label for="return_date" class="form-label">Ngày trả</label>
            <input type="date" name="return_date" id="return_date" class="form-control" value="{{ $borrow->return_date }}" required>
        </div>

        <button type="submit" class="btn btn-primary">Cập Nhật</button>
    </form>
@endsection
