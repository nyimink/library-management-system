@extends('layouts.app')

@section('content')
    <div class="container" style="padding: 20px">
        <a href="{{ url("home") }}" class="btn btn-outline-secondary mb-4" style="width: 90px">&#8617; home</a>
        <a href="{{ url("books/add") }}" class="btn btn-outline-secondary mb-4">&#8629; add a book</a>
        <div class="card">
            <div class="card-header"><b>All Books in LIBRARY</b></div>
            <div class="card-body p-4">
                @if (session('info'))
                    <div class="alert alert-info">
                        {{ session('info') }}
                    </div>
                @endif
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <td>#</td>
                        <td>Title</td>
                        <td>Author</td>
                        <td>Description</td>
                        <td>Category</td>
                        <td>Available</td>
                        <td>Total</td>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($books as $book)
                        <tr>
                            <td>{{ $book->id }}.</td>
                            <td>{{ $book->title }}</td>
                            <td><b>{{ $book->author }}</b></td>
                            <td>{{ $book->description }}</td>
                            <td>{{ $book->category->name }}</td>
                            <td></td>
                            <td></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        </div>
    </div>
@endsection
