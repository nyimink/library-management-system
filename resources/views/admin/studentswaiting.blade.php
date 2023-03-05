@extends('layouts.app')

@section('content')
    <div class="container" style="padding: 20px;">
        <a href="{{ url("home") }}" class="btn btn-outline-secondary mb-4" style="width: 90px">&#8617; home</a>
        <a href="{{ url("students/approved") }}" class="btn btn-outline-secondary mb-4">&#8598; approved students</a>
        <div class="card">
            <div class="card-header"><b>All Undeciding Students</b></div>
            <div class="card-body" style="padding: 20px">
                <div class="row">
                    <div class="col-10">
                        <form action="{{ url('/students/search/waiting') }}" method="get">
                            <div class="input-group">
                                <input type="text" name="search"
                                    class="rounded-start border border-secondary border-opacity-75" style="width: 45%"
                                    placeholder="Search Name, Branch or Email etc. ">
                                <button type="submit" class="btn btn-outline-secondary">&#128269; search</button>
                            </div>
                        </form>
                    </div>
                    <div class="col-2">
                        <a href="{{ url('/refresh/waiting') }}" class="btn btn-sm btn-outline-info float-end">&#8635; refresh</a>
                    </div>
                </div>
                <table class="table mt-4">
                    <tr class="table-active">
                        <th>ID</th>
                        <th>Full Name</th>
                        <th>Roll No.</th>
                        <th>Branch</th>
                        <th>Category</th>
                        <th>Email</th>
                        <th>Actions</th>
                    </tr>
                    @foreach ($students as $student)
                        <tr>
                            <td>{{ $student->id }}</td>
                            <td>{{ $student->firstName }} <b>{{ $student->lastName }}</b></td>
                            <td>{{ $student->rollNumber }}</td>
                            <td>{{ $student->branch->name }}</td>
                            <td>{{ $student->studentCategory->name }}</td>
                            <td>{{ $student->email }}</td>
                            <td>
                                <a href="{{ url("students/approve/$student->id") }}" class="btn btn-sm btn-success">Approve</a>
                                <a href="{{ url("students/reject/$student->id") }}" class="btn btn-sm btn-danger" onClick="return confirm('Are you sure to reject?')">Reject</a>
                            </td>
                        </tr>
                    @endforeach
                </table>
            </div>
            </div>
        </div>

@endsection
