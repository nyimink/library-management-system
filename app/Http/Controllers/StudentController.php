<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function create()
    {
        $student = new Student;
        $student->firstName = request()->firstName;
        $student->lastName = request()->lastName;
        $student->rollNumber = request()->rollNumber;
        $student->branch_id = request()->branch;
        $student->student_category_id = request()->category;
        $student->email = request()->email;
        $student->password = Hash::make(request()->password);

        $student->save();

        return redirect('home');
    }

    public function approved()
    {
        $student = Student::first()->where('approve', '1')->paginate(30);
        return view('admin.students',[
            "students" => $student
        ]);
    }

    public function approve($id)
    {
        $student = Student::find($id);
        $student->approve = '1';
        $student->save();
        return back()->with('approve', "Student \"$student->firstName $student->lastName\" is approved.");
    }

    public function reject($id)
    {
        $student = Student::find($id);
        $student->delete();
        return back()->with('reject', "Student \"$student->firstName $student->lastName\" is reject.");
    }

    public function detail($id)
    {
        $student = Student::find($id);
        return view('admin.studentdetail', [
            "student" => $student
        ]);
    }

    public function ban($id)
    {
        $student = Student::find($id);
        $student->delete();
        return redirect('students/approved')->with('info', "$student->name is reject.");
    }

    public function waiting()
    {
        $student = Student::latest()->where('approve', '0')->paginate(30);
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
