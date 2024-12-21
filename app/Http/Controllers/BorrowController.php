<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Borrow;
use App\Models\Book;
use App\Models\Reader;

class BorrowController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $borrows = Borrow::with(['book', 'reader'])->get();
        return view('borrows.index', compact('borrows'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $books = Book::all();
        $readers = Reader::all();
        return view('borrows.create', compact('books', 'readers'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'reader_id' => 'required|exists:readers,id',
            'book_id' => 'required|exists:books,id',
            'borrow_date' => 'required|date',
            'return_date' => 'required|date|after:borrow_date',
        ]);
    
        Borrow::create($request->all());
        return redirect()->route('borrows.index')->with('success', 'Borrow record added successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $borrow = Borrow::with(['book', 'reader'])->findOrFail($id);
        return view('borrows.show', compact('borrow'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $borrow = Borrow::findOrFail($id);
        $books = Book::all();
        $readers = Reader::all();
        return view('borrows.edit', compact('borrow', 'books', 'readers'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'reader_id' => 'required|exists:readers,id',
            'book_id' => 'required|exists:books,id',
            'borrow_date' => 'required|date',
            'return_date' => 'required|date|after:borrow_date',
            'status' => 'required|in:borrowed,returned',
        ]);
    
        $borrow = Borrow::findOrFail($id);
        $borrow->update($request->all());
    
        return redirect()->route('borrows.index')->with('success', 'Borrow record updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $borrow = Borrow::findOrFail($id);
        $borrow->delete();
        return redirect()->route('borrows.index')->with('success', 'Borrow record deleted successfully!');
    }
}
