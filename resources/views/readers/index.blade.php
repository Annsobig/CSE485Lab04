@extends('layouts.app')

@section('title', 'Danh sách Độc Giả')

@section('content')
    <h1 class="mb-4">Danh sách Độc Giả</h1>

    <a href="{{ route('readers.create') }}" class="btn btn-primary mb-3">Thêm Độc Giả Mới</a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>#</th>
                <th>Họ tên</th>
                <th>Địa chỉ</th>
                <th>Email</th>
                <th>Số điện thoại</th>
                <th>Hành động</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($readers as $reader)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $reader->name }}</td>
                    <td>{{ $reader->address }}</td>
                    <td>{{ $reader->email }}</td>
                    <td>{{ $reader->phone }}</td>
                    <td>
                        <a href="{{ route('readers.edit', $reader->id) }}" class="btn btn-warning btn-sm">Sửa</a>
                        <form action="{{ route('readers.destroy', $reader->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Bạn có chắc chắn muốn xóa?')">Xóa</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6" class="text-center">Không có độc giả nào</td>
                </tr>
            @endforelse
        </tbody>
    </table>
@endsection
