@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-sm-12 col-md-4">
            <div class="list-group">
                <ul>
                    <a href="{{ route('home') }}" class="list-group-item list-group-item-action text-primary font-monospace rounded p-3 mb-2 text-decoration-none">HOME
                    </a>
                    <a href="{{ url("students/waiting") }}" class="list-group-item list-group-item-action text-primary font-monospace rounded p-3 mb-2 text-decoration-none">WAITING STUDENTS
                    </a>
                    <a href="{{ url("students/approved") }}" class="list-group-item list-group-item-action text-primary font-monospace rounded p-3 mb-2 text-decoration-none">APPROVED STUDENTS
                    </a>
                    <a href="{{ url("books") }}" class="list-group-item list-group-item-action text-primary font-monospace rounded p-3 mb-2 text-decoration-none">BOOKS IN LIBRARY
                    </a>
                    <a href="{{ url("category/add") }}" class="list-group-item list-group-item-action text-primary font-monospace rounded p-3 mb-2 text-decoration-none">ADD BOOK CATEGORY
                    </a>
                    <a href="{{ url("books/add") }}" class="list-group-item list-group-item-action text-primary font-monospace rounded p-3 mb-2 text-decoration-none">ADD BOOK
                    </a>
                    <a href="{{ url("settings") }}" class="list-group-item list-group-item-action text-primary font-monospace rounded p-3 mb-2 text-decoration-none">ADD SETTINGS
                    </a>
                    <a href="#" class="list-group-item list-group-item-action text-primary font-monospace rounded p-3 mb-2 text-decoration-none">ISSUE/RETURN BOOKS
                    </a>
                    <a href="#" class="list-group-item list-group-item-action text-primary font-monospace rounded p-3 mb-2 text-decoration-none">CURRENTLY ISSUE BOOKS
                    </a>
                </ul>
            </div>
        </div>
        <div class="col-sm-12 col-md-8">
            @yield('content2')
        </div>
    </div>
</div>
@endsection
