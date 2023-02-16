@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="my-4">Rent Book</h1>
        <div class="row">
            <div class="col-md-4">
                <img src="{{ asset(str_replace('public/', 'storage/', $book->cover_image)) }}" alt="{{ $book->title }}" class="img-fluid">
            </div>
            <div class="col-md-8">
                <h3 class="mb-3">{{ $book->title }}</h3>
                <p>{{ $book->description }}</p>
                @if($book->status === 'available')
                    <p class="text-success">This book is available.</p>
                @elseif($book->status === 'rented')
                    <p class="text-danger">This book is rented.</p>
                @elseif($book->status === 'broken')
                    <p class="text-danger">This book is broken.</p>
                @endif
                <br>
                <ul>
                    <li>Calon peminjam harus memiliki akun anggota aktif perpustakaan yang masih berlaku</li>
                    <li>Durasi peminjaman maksimal adalah 2 minggu. Setelah itu, buku harus dikembalikan ke perpustakaan.</li>
                    <li>Setiap anggota hanya dapat meminjam 2 buku dalam waktu yang bersamaan.</li>
                    <li>Jika buku yang ingin dipinjam tidak tersedia, calon peminjam dapat memesannya dan mengambilnya setelah buku tersebut tersedia.</li>
                </ul>
                <form action="{{ route('orders.store') }}" method="POST">
                    @csrf
                    <input type="hidden" name="book_id" value="{{ $book->id }}">
{{--                    <div class="form-group">--}}
{{--                        <label for="rented_at">Rented At</label>--}}
{{--                        <input type="date" name="rented_at" id="rented_at" class="form-control @error('rented_at') is-invalid @enderror" value="{{ old('rented_at') }}" required>--}}
{{--                        @error('rented_at')--}}
{{--                        <div class="invalid-feedback">{{ $message }}</div>--}}
{{--                        @enderror--}}
{{--                    </div>--}}
                    <div class="form-group">
                        @if($book->status === 'available' && $book->stok > 0)
                            <button type="submit" class="btn btn-primary">Rent Book</button>
                        @else
                            <button type="submit" class="btn btn-primary disabled">Rent Book</button>
                        @endif
                        <a href="{{ url()->previous() }}" class="btn btn-secondary">Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
