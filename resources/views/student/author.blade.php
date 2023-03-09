@extends('layouts.app')

@section('content')
    <div class="container" style="padding: 20px">
        <a href="{{ route('home') }}" class="btn btn-light mb-4 me-2" style="width: 90px">books</a>
        <a href="{{ url("students/author") }}" class="btn btn-light mb-4 me-2">author list</a>
        <a href="{{ url("") }}" class="btn btn-light mb-4 me-2">author list</a>
        <a href="{{ url("") }}" class="btn btn-light mb-4 me-2">author list</a>
        <div class="card bg-light">
            <div class="card-header text-dark"><b>All Books in LIBRARY</b></div>
            <div class="card-body p-4">
                {{ $books->links() }}
                <div class="row">
                    <div class="col-10">
                        <form action="{{ url('students/books/search') }}" method="get">
                            <div class="input-group">
                                <input type="text" name="search"
                                    class="rounded-start border border-secondary border-opacity-75" style="width: 45%"
                                    placeholder="Search book name, author name or category... ">
                                <button type="submit" class="btn btn-outline-secondary">&#128269; search</button>
                            </div>
                        </form>
                    </div>
                    <div class="col-2">
                        <a href="{{ url('/refresh/books') }}" class="btn btn-sm btn-info float-end">&#8635; refresh</a>
                    </div>
                </div>
            <table class="table table-bordered mt-4">
                <thead>
                    <tr>
                        <td>#</td>
                        <td>Author</td>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($books as $book)
                        <tr>
                            <td></td>
                            <td><b>{{ $book->author }}</b></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        </div>
    </div>
@endsection
