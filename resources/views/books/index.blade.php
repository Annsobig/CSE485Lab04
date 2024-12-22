@extends('layouts.app')

@section('title', 'Danh sách Sách')

@section('content')
    <h1 class="mb-4">Danh sách Sách</h1>

    <a href="{{ route('books.create') }}" class="btn btn-primary mb-3">Thêm Sách Mới</a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>#</th>
                <th>Tên sách</th>
                <th>Tác giả</th>
                <th>Thể loại</th>
                <th>Năm xuất bản</th>
                <th>Số lượng</th>
                <th>Hành động</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($books as $book)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $book->name }}</td>
                    <td>{{ $book->author }}</td>
                    <td>{{ $book->category }}</td>
                    <td>{{ $book->year }}</td>
                    <td>{{ $book->quantity }}</td>
                    <td>
                        <a href="{{ route('books.edit', $book->id) }}" class="btn btn-warning btn-sm">Sửa</a>
                        <form action="{{ route('books.destroy', $book->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Bạn có chắc chắn muốn xóa?')">Xóa</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="7" class="text-center">Không có sách nào</td>
                </tr>
            @endforelse
        </tbody>
    </table>
@endsection
