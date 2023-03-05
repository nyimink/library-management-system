@extends('layouts.adminhome')

@section('content2')
    <div class="container" style="padding: 20px">
        <div class="card">
            <div class="card-header"><b>Adding a Book</b></div>
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
                        <label for="" class="float-end">Title of Book:</label>
                    </div>
                    <div class="col-8">
                        <input type="text" name="title" class=" form-control" style="width: 90%" placeholder="Enter the book's title">
                    </div>
                </div>
                <div class="row mb-4 align-items-center">
                    <div class="col-4">
                        <label for="" class="float-end">Author Name:</label>
                    </div>
                    <div class="col-8">
                        <input type="text" name="author" class="form-control" style="width: 90%" placeholder="Enter the author's name of the book">
                    </div>
                </div>
                <div class="row mb-4 align-items-center">
                    <div class="col-4">
                        <label for="" class="float-end">Description of Book:</label>
                    </div>
                    <div class="col-8">
                        <textarea name="description" class="form-control" style="width: 90%" placeholder="Description of the book"></textarea>
                    </div>
                </div>
                <div class="row mb-4 align-items-center">
                    <div class="col-4">
                        <label for="" class="float-end">Category:</label>
                    </div>
                    <div class="col-8">
                        <select name="category_id" class="form-select" style="width: 90%">
                            <option value="" disabled selected>Choose category</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="row mb-4 align-items-center">
                    <div class="col-4">
                        <label for="" class="float-end">Number of Issues:</label>
                    </div>
                    <div class="col-8">
                        <input type="text" name="issue" class="form-control" style="width: 90%" placeholder="How many issues are there?">
                    </div>
                </div>
                <div class="mt-5 d-flex justify-content-evenly">
                <button type="submit" class="btn btn-primary">Add Book</button>
                <div></div>
            </div>
            </form>
        </div>
    </div>
@endsection
