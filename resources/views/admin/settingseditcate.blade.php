@extends('layouts.app')

@section('content')
    <div class="container" style="padding: 20px;">
        <a href="{{ url("/settings") }}" class="btn btn-secondary mb-4" style="width: 90px">&#8617; back</a>
        <a href="{{ url("/redirects") }}" class="btn btn-secondary mb-4" style="width: 90px">&#8617; home</a>
        <div class="card bg-light">
            <div class="card-header text-dark"><b>Settings</b></div>
            <div class="card-body" style="padding: 40px">
                <div class="row">
                    <div class="col-6">
                        @if (session('info'))
                            <div class="alert alert-info alert-dismissible fade show" role="alert">
                                {{ session('info') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        @endif
                        @if (session('delete'))
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                {{ session('delete') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        @endif
                        <h3 class="ms-4 mb-5 text-dark">School Branches</h3>
                        <form action="{{ url('branch/add') }}" method="post">
                            @csrf
                            <div class="row mb-4 mt-2 align-items-center">
                                <div class="col-3">
                                    <label for="" class="text-dark">Branch Name:</label>
                                </div>
                                <div class="col-9">
                                    <input type="text" name="branchName" class="form-control" style=""
                                        placeholder="Enter the new branch name" required>
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
                        @if (session('catedelete'))
                            <div class="alert alert-info">
                                {{ session('catedelete') }}
                            </div>
                        @endif
                        <h3 class="ms-4 mb-5 text-dark">Student Categories</h3>
                        <form method="post">
                            @csrf
                            <div class="row mb-4 mt-2 align-items-center">
                                <div class="col-3">
                                    <label for="" class="text-dark">Category:</label>
                                </div>
                                <div class="col-9">
                                    <input type="text" name="name" class="form-control" style=""
                                        value="{{ $cate->name }}" placeholder="Enter the new category" required>
                                </div>
                            </div>
                            <div class="row mb-4 mt-2 align-items-center">
                                <div class="col-3">
                                    <label for="" class="text-dark">Max Allow:</label>
                                </div>
                                <div class="col-9">
                                    <input type="text" name="max_allow" class="form-control"
                                         value="{{ $cate->max_allow }}" placeholder="Enter maximun amount" required>
                                </div>
                                <div class="mt-4 d-flex justify-content-evenly">
                                    <button type="submit" class="btn-sm btn btn-primary">Update Student Category</button>
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
                                    <td><a href="{{ url("/branch/edit/$branch->id") }}" class="btn btn-sm btn-outline-dark">EDIT</a>
                                    <a href="{{ url("/branch/delete/$branch->id") }}" class="btn btn-sm btn-outline-danger" onClick="return confirm('Are you sure to delete the branch?')">DELETE</a></td>
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
                                    <td><a href="{{ url("/categories/edit/students/$category->id") }}" class="btn btn-sm btn-outline-dark">EDIT</a>
                                        <a href="{{ url("/categories/delete/students/$category->id") }}" class="btn btn-sm btn-outline-danger" onClick="return confirm('Are you sure to delete the category?')">DELETE</a></td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>
    @endsection
