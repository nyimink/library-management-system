<?php

namespace App\Http\Controllers;

use App\Models\StudentCategory;
use Illuminate\Http\Request;

class StudentCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $validator = validator(request()->all(), [
            'name' => 'required',
            'max_allow' => 'required'
        ]);

        if($validator->fails()) {
            return back()->withErrors($validator);
        }

        $category = new StudentCategory;
        $category->name = request()->name;
        $category->max_allow = request()->max_allow;
        $category->save();

        return back()->with('status', 'A new Student Category is created.');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(StudentCategory $studentCategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(StudentCategory $studentCategory)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, StudentCategory $studentCategory)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(StudentCategory $studentCategory)
    {
        //
    }
}
