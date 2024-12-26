<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\OrderDetail;
use App\Models\Order;
use App\Models\Product;

class OrderDetailController extends Controller
{
     // Hiển thị danh sách chi tiết đơn hàng
     public function index()
     {
         $orderDetails = OrderDetail::with(['order', 'product'])->orderBy('id', 'desc')->paginate(10);
         return view('order_details.index', compact('orderDetails'));
     }
 
     // Hiển thị form thêm mới chi tiết đơn hàng
     public function create()
     {
         $orders = Order::all();
         $products = Product::all();
         return view('order_details.create', compact('orders', 'products'));
     }
 
     // Lưu chi tiết đơn hàng mới
     public function store(Request $request)
     {
         $request->validate([
             'order_id' => 'required|exists:orders,id',
             'product_id' => 'required|exists:products,id',
             'quantity' => 'required|integer|min:1',
         ]);
 
         OrderDetail::create([
             'order_id' => $request->order_id,
             'product_id' => $request->product_id,
             'quantity' => $request->quantity,
         ]);
 
         return redirect()->route('order_details.index')->with('success', 'Chi tiết đơn hàng đã được thêm.');
     }
 
     // Hiển thị form chỉnh sửa chi tiết đơn hàng
     public function edit($id)
     {
         $orderDetail = OrderDetail::findOrFail($id);
         $orders = Order::all();
         $products = Product::all();
 
         return view('order_details.edit', compact('orderDetail', 'orders', 'products'));
     }
 
     // Cập nhật chi tiết đơn hàng
     public function update(Request $request, $id)
     {
         $orderDetail = OrderDetail::findOrFail($id);
 
         $request->validate([
             'order_id' => 'required|exists:orders,id',
             'product_id' => 'required|exists:products,id',
             'quantity' => 'required|integer|min:1',
         ]);
 
         $orderDetail->update([
             'order_id' => $request->order_id,
             'product_id' => $request->product_id,
             'quantity' => $request->quantity,
         ]);
 
         return redirect()->route('order_details.index')->with('success', 'Chi tiết đơn hàng đã được cập nhật.');
     }
 
     // Xóa chi tiết đơn hàng
     public function destroy($id)
     {
         $orderDetail = OrderDetail::findOrFail($id);
         $orderDetail->delete();
 
         return redirect()->route('order_details.index')->with('success', 'Chi tiết đơn hàng đã được xóa.');
     }
}