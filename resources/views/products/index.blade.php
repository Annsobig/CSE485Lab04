<?php
@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Danh sách sản phẩm</h2>
        <a href="{{ route('products.create') }}" class="btn btn-primary">Thêm mới sản phẩm</a>

        <table class="table">
            <thead>
            <tr>
                <th>Tên sản phẩm</th>
                <th>Giá</th>
                <th>Số lượng</th>
                <th>Thao tác</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($products as $product)
                <tr>
                    <td>{{ $product->name }}</td>
                    <td>{{ number_format($product->price, 0, ',', '.') }} VNĐ</td>
                    <td>{{ $product->quantity }}</td>
                    <td>
                        <a href="{{ route('products.edit', $product->id) }}" class="btn btn-warning">Chỉnh sửa</a>
                        <form action="{{ route('products.destroy', $product->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Xóa</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection


