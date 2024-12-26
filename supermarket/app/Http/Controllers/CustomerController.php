<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;

class CustomerController extends Controller
{
    public function index()
    {
        $customers = Customer::orderBy('id', 'desc')->get();
        return view('customers.index', compact('customers'));
    }

    // Hiển thị form tạo mới khách hàng
    public function create()
    {
        return view('customers.create');
    }

    // Lưu thông tin khách hàng mới
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
            'address' => 'nullable|max:255',
            'phone' => 'required|unique:customers,phone|max:15',
            'email' => 'required|email|unique:customers,email',
        ]);

        Customer::create($request->all());

        return redirect()->route('customers.index')->with('success', 'Khách hàng đã được thêm mới.');
    }

    // Hiển thị thông tin chi tiết khách hàng
    public function show($id)
    {
        $customer = Customer::findOrFail($id);
        return view('customers.show', compact('customer'));
    }

    // Hiển thị form chỉnh sửa khách hàng
    public function edit($id)
    {
        $customer = Customer::findOrFail($id);
        return view('customers.edit', compact('customer'));
    }

    // Cập nhật thông tin khách hàng
    public function update(Request $request, $id)
    {
        $customer = Customer::findOrFail($id);

        $request->validate([
            'name' => 'required|max:255',
            'address' => 'nullable|max:255',
            'phone' => 'required|max:15|unique:customers,phone,' . $customer->id,
            'email' => 'required|email|unique:customers,email,' . $customer->id,
        ]);

        $customer->update($request->all());

        return redirect()->route('customers.index')->with('success', 'Thông tin khách hàng đã được cập nhật.');
    }

    // Xóa khách hàng
    public function destroy($id)
    {
        $customer = Customer::findOrFail($id);
        $customer->delete();

        return redirect()->route('customers.index')->with('success', 'Khách hàng đã được xóa.');
    }
}
