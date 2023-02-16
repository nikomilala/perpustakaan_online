@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2>{{ $publisher->name }}</h2>
                <p>{{ $publisher->description }}</p>
                <hr>
                <h3>Books published by {{ $publisher->name }}</h3>
                <ul>
                    @foreach ($publisher->books as $book)
                        <li><a href="{{ route('books.show', $book) }}">{{ $book->title }}</a></li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
@endsection
