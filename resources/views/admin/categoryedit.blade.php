@extends('layouts.adminhome')

@section('content2')
    <div class="container" style="padding: 20px;">
        <a href="{{ url("/category/add") }}" class="btn btn-secondary mb-4" style="width: 90px">&#8617; back</a>
        <div class="card bg-light">
            <div class="card-header text-dark"><b>Editing Book Category</b></div>
            @if ($errors->any())
                <div class="alert alert-warning">
                    @foreach ($errors->all() as $err)
                        <li>{{ $err }}</li>
                    @endforeach
                </div>
            @endif
            <form method="post" enctype="multipart/form-data" style="padding: 20px">
                @csrf
                <div class="row mb-4 mt-2 align-items-center">
                    <div class="col-4">
                        <label for="" class="float-end text-dark">Update category:</label>
                    </div>
                    <div class="col-8">
                        <input type="text" name="name" class="form-control" style="width: 90%"
                            placeholder="Enter the new category" required value="{{ $category->name }}">
                    </div>
                    <div class="mt-4 d-flex justify-content-evenly">
                        <button type="submit" class="btn btn-success">Update Category</button>
                        <div></div>
                    </div>
            </form>

        </div>
    </div>
@endsection
