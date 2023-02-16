@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2 class="mb-4">Welcome to Our Library</h2>
                <form class="form-inline justify-content-center">
                    <div class="form-group">
                        <input type="text" class="form-control mr-2 mb-2 mb-md-0" placeholder="Search books...">
                        <button type="submit" class="btn btn-primary">Search</button>
                    </div>
                </form>
            </div>
        </div>
        <div class="row mt-4">
            @foreach($books as $book)
                <div class="col-md-4 mb-4">
                    <div class="card shadow-sm">
                        <img src="{{ asset(str_replace('public/', 'storage/', $book->cover_image)) }}" alt="{{ $book->title }}" class="card-img-top">
                        <div class="card-body">
                            <h5 class="card-title">{{ $book->title }}</h5>
                            <p class="card-text">{{ $book->description }}</p>
                            <a href="{{ route('books.show', $book) }}" class="btn btn-primary">View Details</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection

@push('styles')
    <style>
        .form-control {
            width: 60%;
        }

        .btn-primary {
            background-color: #4caf50;
            border-color: #4caf50;
        }

        .btn-primary:hover {
            background-color: #388e3c;
            border-color: #388e3c;
        }

        .card {
            border-radius: 10px;
            overflow: hidden;
        }

        .card-img-top {
            object-fit: cover;
            height: 200px;
        }

        .card-title {
            font-size: 1.2rem;
        }

        .card-text {
            height: 100px;
            overflow: hidden;
        }
    </style>
@endpush
