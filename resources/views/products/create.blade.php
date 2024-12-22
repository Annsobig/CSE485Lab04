<?php
@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Thêm mới sản phẩm</h2>

        <form action="{{ route('products.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="name">Tên sản phẩm</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>
            <div class="form-group">
                <label for="description">Mô tả</label>
                <textarea class="form-control" id="description" name="description" required></textarea>
            </div>
            <div class="form-group">
                <label for="price">Giá</label>
                <input type="number" class="form-control" id="price" name="price" required min="0">
            </div>
            <div class="form-group">
                <label for="quantity">Số lượng tồn kho</label>
                <input type="number" class="form-control" id="quantity" name="quantity" required min="0">
            </div>
            <button type="submit" class="btn btn-success">Thêm sản phẩm</button>
        </form>
    </div>
@endsection
