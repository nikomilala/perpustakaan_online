<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\Book;
use App\Http\Requests\StoreBookRequest;
use App\Http\Requests\UpdateBookRequest;
use App\Models\Publisher;

class BookController extends Controller
{

    public function __construct()
    {
        $this->middleware('permission:view books', ['only' => ['index']]);
        $this->middleware('permission:create books', ['only' => ['create', 'store']]);
        $this->middleware('permission:edit books', ['only' => ['edit', 'update']]);
        $this->middleware('permission:delete books', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $books = Book::all();

        return view('books.index', compact('books'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $authors = Author::all();
        $publishers = Publisher::all();

        return view('books.create', compact('authors', 'publishers'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreBookRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreBookRequest $request)
    {
        // Validate that the request has a non-empty title
        $request->validate([
            'title' => 'required',
        ]);

        $book = new Book([
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'author_id' => $request->input('author_id'),
            'publisher_id' => $request->input('publisher_id'),
            'year' => $request->input('year'),
            'stok' => $request->input('stok'),
            'isbn' => $request->input('isbn'),
            'status' => $request->input('status'),
        ]);

        // Validate that the request has a cover image
        if ($request->hasFile('cover_image')) {
            $book->cover_image = $request->file('cover_image')->store('public/cover_images');
        } else {
            return back()->withInput()->with('error', 'The cover image is required.');
        }

        // Validate that the book status is valid
        if (!in_array($book->status, ['available', 'rented', 'broken'])) {
            return back()->withInput()->with('error', 'Invalid book status.');
        }

        $book->save();

        // Set the book status to 'available'
        $book->update(['status' => 'available']);

        return redirect()->route('books.show', $book->id);
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function show(Book $book)
    {
        return view('books.show', compact('book'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function edit(Book $book)
    {
        $authors = Author::all();
        $publishers = Publisher::all();

        return view('books.edit', compact('book', 'authors', 'publishers'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateBookRequest  $request
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateBookRequest $request, Book $book)
    {
        $validatedData = $request->validated();
        $book->update($validatedData);

        return redirect()->route('books.show', $book->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function destroy(Book $book)
    {
        $book->delete();

        return redirect()->route('books.index');
    }

    /**
     * Publish the specified resource.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */

}

