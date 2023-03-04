@extends('layouts.adminhome')

@section('content2')
    <div class="container-fluid" style="padding: 20px">
        <div class="card">
            <div class="card-header">All Books in LIBRARY</div>
            <div class="card-body p-4">
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
