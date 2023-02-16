@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Books by {{ $author->name }}</h1>

        <div class="row">
            @foreach ($author->books as $book)
                <div class="col-md-4 mb-3">
                    <div class="card">
                        <img class="card-img-top" src="{{ asset(str_replace('public/', 'storage/', $book->cover_image)) }}" alt="{{ $book->title }}">
                        <div class="card-body">
                            <h5 class="card-title">{{ $book->title }}</h5>
                            <p class="card-text">{{ $book->description }}</p>
                            <a href="{{ route('books.show', $book->id) }}" class="btn btn-primary">View Details</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
