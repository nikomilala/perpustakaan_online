@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Return Book</h1>
                <p>Are you sure you want to return this book?</p>
                <form method="POST" action="{{ route('orders.return', $order) }}">
                    @csrf
                    @method('PUT')
                    <button type="submit" class="btn btn-danger">Return Book</button>
                    <a href="{{ route('orders.index') }}" class="btn btn-secondary">Cancel</a>
                </form>
            </div>
        </div>
    </div>
@endsection
