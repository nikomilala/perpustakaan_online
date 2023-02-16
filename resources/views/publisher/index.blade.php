@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Publishers</h1>
                @can('create publishers')
                <a href="{{ route('publishers.create') }}" class="btn btn-primary mb-3">Add Publisher</a>
                @endcan
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Description</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($publishers as $publisher)
                            <tr>
                                <td>{{ $publisher->name }}</td>
                                <td>{{ $publisher->description }}</td>
                                <td>
                                    @can('edit publishers')
                                    <a href="{{ route('publishers.edit', $publisher) }}" class="btn btn-sm btn-primary">Edit</a>
                                    @endcan
                                    @can('delete publishers')
                                    <form action="{{ route('publishers.destroy', $publisher) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this publisher?')">Delete</button>
                                    </form>
                                    @endcan
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
