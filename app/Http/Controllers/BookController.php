<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use Inertia\Inertia;

class BookController extends Controller
{
    public function index()
    {
        $books = Book::all();
        return Inertia::render('Books/Index', compact('books'));
    }

    public function create()
    {
        return Inertia::render('Books/Create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'author' => 'required',
            'description' => 'required',
        ]);

        Book::create($request->all());
        return redirect('/book');
    }

    public function show(Book $book)
    {
        return Inertia::render('Books/View', compact('book'));
    }

    public function edit(Book $book)
    {
        return Inertia::render('Books/Edit', compact('book'));
    }

    public function update(Request $request, Book $book)
    {
        $request->validate([
            'title' => 'required',
            'author' => 'required',
        ]);

        $book->update($request->all());
        return redirect('/book');
    }

    public function destroy(Book $book)
    {
        $book->delete();
        return redirect('/book');
    }
}

