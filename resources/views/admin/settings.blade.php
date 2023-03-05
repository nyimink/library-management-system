@extends('layouts.app')

@section('content')
    <div class="container" style="padding: 20px;">
        <a href="{{ url("home") }}" class="btn btn-outline-secondary mb-4" style="width: 90px">&#8617; home</a>
        <div class="card">
            <div class="card-header"><b>Settings</b></div>
            <div class="card-body" style="padding: 40px">
                <div class="row">
                    <div class="col-6">
                        @if (session('info'))
                            <div class="alert alert-info">
                                {{ session('info') }}
                            </div>
                        @endif
                        <h3 class="ms-4 mb-5">School Branches</h3>
                        <form action="{{ url('branch/add') }}" method="post">
                            @csrf
                            <div class="row mb-4 mt-2 align-items-center">
                                <div class="col-3">
                                    <label for="">Branch Name:</label>
                                </div>
                                <div class="col-9">
                                    <input type="text" name="branchName" class="form-control" style=""
                                        placeholder="Enter the new category" required>
                                </div>
                                <div class="mt-4 d-flex justify-content-evenly">
                                    <button type="submit" class="btn btn-sm btn-primary">Add Branch</button>
                                    <div></div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="col-6">
                        @if (session('status'))
                            <div class="alert alert-info">
                                {{ session('status') }}
                            </div>
                        @endif
                        <h3 class="ms-4 mb-5">Student Categories</h3>
                        <form action="{{ url("/categories/add/students") }}" method="post">
                            @csrf
                            <div class="row mb-4 mt-2 align-items-center">
                                <div class="col-3">
                                    <label for="">Category:</label>
                                </div>
                                <div class="col-9">
                                    <input type="text" name="name" class="form-control" style=""
                                        placeholder="Enter the new category" required>
                                </div>
                            </div>
                            <div class="row mb-4 mt-2 align-items-center">
                                <div class="col-3">
                                    <label for="">Max Allow:</label>
                                </div>
                                <div class="col-9">
                                    <input type="text" name="max_allow" class="form-control" style=""
                                        placeholder="Enter maximun amount" required>
                                </div>
                                <div class="mt-4 d-flex justify-content-evenly">
                                    <button type="submit" class="btn-sm btn btn-primary">Add Student Category</button>
                                    <div></div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <table class="table">
                            <tr>
                                <th>#</th>
                                <th>Branch</th>
                                <th>Action</th>
                            </tr>
                            @foreach ($branch as $branch)
                                <tr>
                                    <td>{{ $branch->id }}</td>
                                    <td>{{ $branch->name }}</td>
                                    <td><a href="#" class="btn btn-sm btn-warning">EDIT</a>
                                    <a href="#" class="btn btn-sm btn-danger">DELETE</a></td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                    <div class="col-6">
                        <table class="table">
                            <tr>
                                <th>#</th>
                                <th>Category</th>
                                <th>Max Allow</th>
                                <th>Action</th>
                            </tr>
                            @foreach ($categories as $category)
                                <tr>
                                    <td>{{ $category->id }}</td>
                                    <td>{{ $category->name }}</td>
                                    <td>{{ $category->max_allow }}</td>
                                    <td><a href="#" class="btn btn-sm btn-warning">EDIT</a>
                                        <a href="#" class="btn btn-sm btn-danger">DELETE</a></td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>
    @endsection
