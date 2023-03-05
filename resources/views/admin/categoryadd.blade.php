@extends('layouts.adminhome')

@section('content2')
    <div class="container" style="padding: 20px;">
        <div class="card">
            <div class="card-header"><b>Adding Book Category</b></div>
            @if ($errors->any())
                <div class="alert alert-warning">
                    @foreach ($errors->all() as $err)
                        <li>{{ $err }}</li>
                    @endforeach
                </div>
            @endif
            @if (session('info'))
                <div class="alert alert-info">
                    {{ session('info') }}
                </div>
            @endif
            <form method="post" enctype="multipart/form-data" style="padding: 20px">
                @csrf
                <div class="row mb-4 mt-2 align-items-center">
                    <div class="col-4">
                        <label for="" class="float-end">Category:</label>
                    </div>
                    <div class="col-8">
                        <input type="text" name="name" class="form-control" style="width: 90%"
                            placeholder="Enter the new category">
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
                                <td>EDIT DELETE</td>
                            </tr>
                        @endforeach
                    </table>
                </div>
                <div class="col-1"></div>
            </div>
        </div>
    </div>
@endsection
