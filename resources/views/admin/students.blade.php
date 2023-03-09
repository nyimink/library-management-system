@extends('layouts.app')

@section('content')
    <div class="container" style="padding: 20px;">
        <a href="{{ url("/redirects") }}" class="btn btn-secondary mb-4" style="width: 90px">&#8617; home</a>
        <a href="{{ url("students/waiting") }}" class="btn btn-secondary mb-4">&#8599; waiting students</a>
        @if (session('info'))
            <div class="alert alert-danger">
                {{ session('info') }}
            </div>
        @endif
        <div class="card bg-light">
            <div class="card-header text-dark"><b>All Approved Students</b></div>
            <div class="card-body" style="padding: 20px">
                {{ $students->links() }}
                <div class="row">
                    <div class="col-10">
                        <form action="{{ url('/students/search') }}" method="get">
                            <div class="input-group">
                                <input type="text" name="search"
                                    class="rounded-start border border-secondary border-opacity-75" style="width: 45%"
                                    placeholder="Search Name, Branch or Email etc. ">
                                <button type="submit" class="btn btn-outline-dark">&#128269; search</button>
                            </div>
                        </form>
                    </div>
                    <div class="col-2">
                        <a href="{{ url('/refresh') }}" class="btn btn-sm btn-info float-end">&#8635; refresh</a>
                    </div>
                </div>
                <table class="table mt-4">
                    <tr class="table-active">
                        <th>ID</th>
                        <th>Full Name</th>
                        <th>Branch</th>
                        <th>Roll No.</th>
                        <th>Books issued</th>
                        <th></th>
                    </tr>
                    @foreach ($students as $student)
                        <tr>
                            <td>{{ $student->id }}</td>
                            <td>{{ $student->firstName }} <b>{{ $student->lastName }}</b></td>
                            <td>{{ $student->branch->name }}</td>
                            <td>{{ $student->rollNumber }}</td>
                            <td class="text-center">{{ $student->books_issue }}</td>
                            <td>
                                <a href="{{ url("students/ban/$student->id") }}" class="btn btn-outline-danger btn-sm" onClick="return confirm('Are you sure to ban this student?')">Ban</a>
                                <a href="{{ url("student/detail/$student->id") }}" class="btn btn-sm btn-outline-secondary">Detail</a>
                            </td>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
@endsection
