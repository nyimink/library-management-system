@extends('layouts.app')

@section('content')
    <div class="container" style="padding: 20px;">
        <a href="{{ url("students/approved") }}" class="btn btn-secondary mb-4" style="width: 90px">&#8617; back</a>
        <a href="{{ url("home") }}" class="btn btn-secondary mb-4" style="width: 90px">⌂ home</a>
        <div class="card bg-light" style="max-width: 680px">
            <div class="card-header text-dark"><b>Student Detail</b></div>
            <div class="card-body" style="padding: 20px">
                <div class="container">
                    <div class="card" style="padding: 10px; max-width: 600px">
                        <div class="card-body">
                            <p class="card-text text-dark">First Name: <b>{{ $student->firstName }}</b></p>
                            <p class="card-text text-dark">Last Name: <b>{{ $student->lastName }}</b></p>
                            <p class="card-text text-dark">Roll Number: <b>{{ $student->rollNumber }}</b></p>
                            <p class="card-text text-dark">Branch Name: <b>{{ $student->branch->name }}</b></p>
                            <p class="card-text text-dark">Category: <b>{{ $student->studentCategory->name }}</b></p>
                            <p class="card-text text-dark">Books Issues: <b>{{ $student->books_issue }}</b></p>
                            <p class="card-text text-dark">Approved: <b>&#x2713;</b></p>
                            <a href="{{ url("students/ban/$student->id") }}" class="btn btn-danger mt-3" style="width: 30%" onClick="return confirm('Are you sure to ban this student?')">Ban</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>


@endsection
