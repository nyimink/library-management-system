@extends('layouts.adminhome')

@section('content2')
    <div class="container" style="padding: 20px;">
        <div class="card bg-light">
            <div class="card-header text-dark"><b>Adding Book Category</b></div>
            @if ($errors->any())
                <div class="alert alert-warning">
                    @foreach ($errors->all() as $err)
                        <li>{{ $err }}</li>
                    @endforeach
                </div>
            @endif
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
            <form method="post" enctype="multipart/form-data" style="padding: 20px">
                @csrf
                <div class="row mb-4 mt-2 align-items-center">
                    <div class="col-4">
                        <label for="" class="float-end text-dark">Category:</label>
                    </div>
                    <div class="col-8">
                        <input type="text" name="name" class="form-control" style="width: 90%"
                            placeholder="Enter the new category" required>
                    </div>
                    <div class="mt-4 d-flex justify-content-evenly">
                        <button type="submit" class="btn btn-primary">Add Category</button>
                        <div></div>
                    </div>
            </form>
            <div class="row">
                <div class="col-1"></div>
                <div class="col-10">
                    <table class="table mt-4 border">
                        <caption>Category List</caption>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>ACTIONS</th>
                        </tr>
                        @foreach ($categories as $category)
                            <tr>
                                <td>{{ $category->id }}</td>
                                <td><b>{{ $category->name }}</b></td>
                                <td>
                                    <a href="{{ url("/category/edit/$category->id") }}" class="btn btn-sm btn-outline-dark">Edit</a>
                                    <a href="{{ url("/category/delete/$category->id") }}" class="btn btn-sm btn-outline-danger" onClick="return confirm('Are you sure to delete this category?')">Delete</a>
                                </td>
                            </tr>
                        @endforeach
                    </table>
                    {{ $categories->links() }}
                </div>
                <div class="col-1"></div>
            </div>
        </div>
    </div>
@endsection
