@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Edit Publisher</h2>
        @can('edit publishers')
        <form method="POST" action="{{ route('publishers.update', $publisher->id) }}">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name', $publisher->name) }}">
                @error('name')
                    <span class="invalid-feedback" role="alert">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description" rows="3">{{ old('description', $publisher->description) }}</textarea>
                @error('description')
                    <span class="invalid-feedback" role="alert">{{ $message }}</span>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
            <a href="{{ route('publishers.index') }}" class="btn btn-secondary">Cancel</a>
        </form>
        @endcan
    </div>
@endsection
