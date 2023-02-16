@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <img src="{{ asset(str_replace('public/', 'storage/', $book->cover_image)) }}" alt="{{ $book->title }}" class="img-fluid">
            </div>
            <div class="col-md-8">
                <h3 class="mb-3">{{ $book->title }}</h3>
                <p>{{ $book->description }}</p>
                <ul>
                    <li>Author: {{ $book->author->name }}</li>
                    <li>Publisher: {{ $book->publisher->name }}</li>
                    <li> Stok : {{ $book->stok }}</li>
                    <li>Year: {{ $book->year }}</li>
                    <li>Pages: {{ $book->pages }}</li>
                    <li>ISBN: {{ $book->isbn }}</li>
                    <li>Status: {{ $book->status }}</li>
                </ul>
                @if ($book->status === 'available')
                    <a href="{{ route('orders.create', $book) }}" class="btn btn-primary ">Order This Book</a>
                @elseif($book->status === 'rented')
                    <a href="{{ route('orders.index') }}" class="btn btn-primary">Return This Book</a>
                @elseif($book->status === 'broken')
                    <a href="{{ route('orders.cancel', $book) }}" class="btn btn-primary disabled">Order This Book</a>
                @endif


            </div>
        </div>

    </div>
@endsection
