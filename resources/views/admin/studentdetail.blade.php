@extends('layouts.app')

@section('content')
    <div class="container" style="padding: 20px;">
        <a href="{{ url("home") }}" class="btn btn-outline-secondary mb-4" style="width: 90px">&#8617; back</a>
        <div class="card" style="max-width: 680px">
            <div class="card-header"><b>Student Detail</b></div>
            <div class="card-body" style="padding: 20px">
                <div class="container">
                    <div class="card" style="padding: 10px; max-width: 600px">
                        <div class="card-body">
                            <p class="card-text">First Name: <b>{{ $student->firstName }}</b></p>
                            <p class="card-text">Last Name: <b>{{ $student->lastName }}</b></p>
                            <p class="card-text">Roll Number: <b>{{ $student->rollNumber }}</b></p>
                            <p class="card-text">Branch Name: <b>{{ $student->branch->name }}</b></p>
                            <p class="card-text">Category: <b>{{ $student->studentCategory->name }}</b></p>
                            <p class="card-text">Books Issues: <b>{{ $student->books_issue }}</b></p>
                            <p class="card-text">Approved: <b>&#x2713;</b></p>
                            <a href="" class="btn btn-danger mt-3" style="width: 30%">Ban</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>


@endsection
