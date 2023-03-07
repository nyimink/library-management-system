@extends('layouts.app')

@section('content')

    <body>
        <div class="container" style="max-width: 600px;">
            <h1 class="text-center">Student Registration Form</h1>
            <p class="text-center"><i>Please fill out this form with required information</i></p>
            <div class="beauty" style="padding: 40px">
                <form action="{{ url('students/create') }}" method="post">
                    @csrf
                    <div class="mb-4">
                        <label class="mb-1">First Name</label>
                        <input type="text" name="firstName" class="form-control" placeholder="Enter your first name">
                    </div>
                    <div class="mb-4">
                        <label class="mb-1">Last Name</label>
                        <input type="text" name="lastName" class="form-control" placeholder="Enter your last name">
                    </div>
                    <div class="mb-4">
                        <label class="mb-1">Roll Number</label>
                        <input type="integer" name="rollNumber" class="form-control" placeholder="Enter your roll number">
                    </div>
                    <div class="mb-4">
                        <label class="mb-1">Branch Name</label>
                        <select name="branch" class="form-select" required>
                                <option disabled selected>Choose school branch</option>
                            @foreach ($branch as $branch)
                                <option value="{{ $branch->id }}">{{ $branch->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-4">
                        <label class="mb-1">Student Category</label>
                        <select name="category" class="form-select">
                                <option value="" disabled selected>Choose student category</option>
                            @foreach ($category as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-4">
                        <label class="mb-1">Email</label>
                        <input type="text" name="email" class="form-control" placeholder="Enter your email address">
                    </div>
                    <div class="mb-4">
                        <label class="mb-1">Password</label>
                        <input type="password" name="password" class="form-control" placeholder="Enter password">
                    </div>
                    <div class="mb-4">
                        <label class="mb-1">Confirm Password</label>
                        <input type="password" name="" class="form-control" placeholder="">
                    </div>

                    <input type="submit" name="submit" class="btn btn-success w-100 mt-3" value="Submit">


                </form>
            </div>
        </div>
    @endsection
