@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="my-4">List of Orders</h1>

        @if ($orders->isEmpty())
            <div class="alert alert-warning" role="alert">
                There are no orders.
            </div>
        @else
            <table class="table">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Book Title</th>
                    <th>User</th>
                    <th>Rented At</th>
                    <th>Returned At</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($orders as $order)
                    <tr>
                        <td>{{ $order->id }}</td>
                        <td>{{ $order->book->title }}</td>
                        <td>{{ $order->user->name }}</td>
                        <td>{{ $order->rented_at }}</td>
                        <td>{{ $order->returned_at }}</td>
                        <td>
                            @if ($order->returned_at === null)
                                <a href="{{ route('orders.return', $order) }}" class="btn btn-primary">Return</a>
                            @endif
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>

            <div class="mt-3">
                {{ $orders->links() }}
            </div>
        @endif
    </div>
@endsection
