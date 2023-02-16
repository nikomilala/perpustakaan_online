@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="my-4">Books</h1>

        @can('create books')
            <div class="text-right mb-3">
                <a href="{{ route('books.create') }}" class="btn btn-primary">Add New Book</a>
            </div>
        @endcan

        <table class="table">
            <thead>
            <tr>
                <th>Title</th>
                <th>Author</th>
                <th>Publisher</th>
                <th>Published Date</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($books as $book)
                <tr>
                    <td>{{ $book->title }}</td>
                    <td>{{ $book->author->name }}</td>
                    <td>{{ $book->publisher->name }}</td>
                    <td>{{ $book->created_at }}</td>
                    <td>{{ $book->status }}</td>
                    <td>
                        <a href="{{ route('books.show', $book->id) }}" class="btn btn-primary btn-sm">View</a>
                        @can('edit books')
                            <a href="{{ route('books.edit', $book->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        @endcan
                        @can('delete books')
                            <form action="{{ route('books.destroy', $book->id) }}" method="POST" class="d-inline-block">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</button>
                            </form>
                        @endcan
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
