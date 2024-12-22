@extends('layouts.app')

@section('title', 'Danh sách Mượn Sách')

@section('content')
    <h1 class="mb-4">Danh sách Mượn Sách</h1>

    <a href="{{ route('borrows.create') }}" class="btn btn-primary mb-3">Thêm Mượn Sách Mới</a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>#</th>
                <th>Độc giả</th>
                <th>Sách</th>
                <th>Ngày mượn</th>
                <th>Ngày trả</th>
                <th>Hành động</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($borrows as $borrow)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $borrow->reader->name }}</td>
                    <td>{{ $borrow->book->title }}</td>
                    <td>{{ $borrow->borrow_date }}</td>
                    <td>{{ $borrow->return_date }}</td>
                    <td>
                        <a href="{{ route('borrows.edit', $borrow->id) }}" class="btn btn-warning btn-sm">Sửa</a>
                        <form action="{{ route('borrows.destroy', $borrow->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Bạn có chắc chắn muốn xóa?')">Xóa</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6" class="text-center">Không có mượn sách nào</td>
                </tr>
            @endforelse
        </tbody>
    </table>
@endsection
