<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Customer;
use App\Models\Product;
use App\Models\OrderDetail;

class OrderController extends Controller
{
    // Hiển thị danh sách đơn hàng
    public function index()
    {
        $orders = Order::with('customer')->orderBy('id', 'desc')->get();
        return view('orders.index', compact('orders'));
    }

    // Hiển thị form thêm mới đơn hàng
    public function create()
    {
        $customers = Customer::all();
        $products = Product::all();
        return view('orders.create', compact('customers', 'products'));
    }

    // Lưu đơn hàng mới
    public function store(Request $request)
    {
        $request->validate([
            'customer_id' => 'required|exists:customers,id',
            'order_date' => 'required|date',
            'status' => 'required|string|max:255',
            'product_ids' => 'required|array',
            'product_ids.*' => 'exists:products,id',
            'quantities' => 'required|array',
            'quantities.*' => 'integer|min:1',
        ]);

        // Tạo đơn hàng
        $order = Order::create([
            'customer_id' => $request->customer_id,
            'order_date' => $request->order_date,
            'status' => $request->status,
        ]);

        // Lưu chi tiết đơn hàng
        foreach ($request->product_ids as $key => $productId) {
            OrderDetail::create([
                'order_id' => $order->id,
                'product_id' => $productId,
                'quantity' => $request->quantities[$key],
            ]);
        }

        return redirect()->route('orders.index')->with('success', 'Đơn hàng đã được tạo.');
    }

    // Hiển thị thông tin chi tiết đơn hàng
    public function show($id)
    {
        $order = Order::with('customer', 'orderDetails.product')->findOrFail($id);
        return view('orders.show', compact('order'));
    }

    // Hiển thị form chỉnh sửa đơn hàng
    public function edit($id)
    {
        $order = Order::with('orderDetails')->findOrFail($id);
        $customers = Customer::all();
        $products = Product::all();

        return view('orders.edit', compact('order', 'customers', 'products'));
    }

    // Cập nhật thông tin đơn hàng
    public function update(Request $request, $id)
    {
        $order = Order::findOrFail($id);

        $request->validate([
            'customer_id' => 'required|exists:customers,id',
            'order_date' => 'required|date',
            'status' => 'required|string|max:255',
            'product_ids' => 'required|array',
            'product_ids.*' => 'exists:products,id',
            'quantities' => 'required|array',
            'quantities.*' => 'integer|min:1',
        ]);

        // Cập nhật đơn hàng
        $order->update([
            'customer_id' => $request->customer_id,
            'order_date' => $request->order_date,
            'status' => $request->status,
        ]);

        // Xóa chi tiết đơn hàng cũ
        $order->orderDetails()->delete();

        // Lưu chi tiết đơn hàng mới
        foreach ($request->product_ids as $key => $productId) {
            OrderDetail::create([
                'order_id' => $order->id,
                'product_id' => $productId,
                'quantity' => $request->quantities[$key],
            ]);
        }

        return redirect()->route('orders.index')->with('success', 'Đơn hàng đã được cập nhật.');
    }

    // Xóa đơn hàng
    public function destroy($id)
    {
        $order = Order::findOrFail($id);
        $order->orderDetails()->delete();
        $order->delete();

        return redirect()->route('orders.index')->with('success', 'Đơn hàng đã được xóa.');
    }
}
