@extends('layouts.adminhome')

@section('content2')
    <div class="container" style="padding: 20px;">
        <div class="card">
            <div class="card-header">Add Book</div>
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
        </div>
    </div>
@endsection
