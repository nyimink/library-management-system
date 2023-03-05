<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function approved()
    {
        $student = Student::all()->where('approve', '1');
        return view('admin.students',[
            "students" => $student
        ]);
    }

    public function approve($id)
    {
        $student = Student::find($id);
        $student->approve = '1';
        $student->save();
        return back()->with('info', "$student->name is approved.");
    }

    public function reject($id)
    {
        $student = Student::find($id);
        $student->delete();
        return back()->with('info', "$student->name is reject.");
    }

    public function detail($id)
    {
        $student = Student::find($id);
        return view('admin.studentdetail', [
            "student" => $student
        ]);
    }

    public function waiting()
    {
        $student = Student::all()->where('approve', '0');
        return view('admin.studentswaiting', [
            "students" => $student
        ]);
    }

    public function searchWaiting()
    {
        $search = request()->search;
        $student = Student::where('firstName', 'Like', '%'.$search.'%')
                            ->orWhere('lastName', 'Like', '%'.$search.'%')
                            ->orWhere('email', 'Like', '%'.$search.'%')
                            ->get();
        return view('admin.studentswaiting',[
            "students" => $student,
        ]);
    }

    public function search()
    {
        $search = request()->search;
        $student = Student::where('firstName', 'Like', '%'.$search.'%')
                            ->orWhere('lastName', 'Like', '%'.$search.'%')
                            ->orWhere('email', 'Like', '%'.$search.'%')
                            ->get();
        return view('admin.students',[
            "students" => $student,
        ]);
    }
}
