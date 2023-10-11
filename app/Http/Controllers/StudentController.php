<?php

namespace App\Http\Controllers;

use App\Models\Branch;
use App\Models\Student;
use App\Models\StudentCategory;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class StudentController extends Controller
{
    public function __construct()
    {
        return $this->middleware('isAdmin')->except("register");
    }

    public function register()
    {
        $branch = Branch::all();
        $studentCategory = StudentCategory::all();
        return view('register', [
            "branch" => $branch,
            "category" => $studentCategory,
        ]);
    }

    public function create()
    {
        $student = new User;
        $student->firstName = request()->firstName;
        $student->lastName = request()->lastName;
        $student->rollNumber = request()->rollNumber;
        $student->branch_id = request()->branch;
        $student->student_category_id = request()->category;
        $student->email = request()->email;
        $student->password = Hash::make(request()->password);

        $student->save();

        return redirect('login')->with('info', 'Your account is successfully created. Please log in.');
    }

    public function approved()
    {
        $student = User::first()->where('approve', '1')->paginate(30);
        return view('admin.students',[
            "students" => $student
        ]);
    }

    public function approve($id)
    {
        $student = User::find($id);
        $student->approve = '1';
        $student->save();
        return back()->with('approve', "Student \"$student->firstName $student->lastName\" is approved.");
    }

    public function reject($id)
    {
        $student = User::find($id);
        $student->delete();
        return back()->with('reject', "Student \"$student->firstName $student->lastName\" is rejected.");
    }

    public function detail($id)
    {
        $student = User::find($id);
        return view('admin.studentdetail', [
            "student" => $student
        ]);
    }

    public function ban($id)
    {
        $student = User::find($id);
        $student->delete();
        return redirect('students/approved')->with('info', "Student \"$student->firstName $student->lastName\" is rejected.");
    }

    public function waiting()
    {
        $student = User::latest()->where('approve', '0')
                                ->where('userType', '0')
                                ->paginate(30);
        return view('admin.studentswaiting', [
            "students" => $student
        ]);
    }

    public function searchWaiting()
    {
        $search = request()->search;
        $student = User::where('approve', '0')
                            ->where('firstName', 'Like', '%'.$search.'%')
                            ->orWhere('lastName', 'Like', '%'.$search.'%')
                            ->orWhere('email', 'Like', '%'.$search.'%')
                            ->paginate(20);
        return view('admin.studentswaiting',[
            "students" => $student,
        ]);
    }

    public function search()
    {
        $search = request()->search;
        $student = User::where('approve', '1')
                            ->where('firstName', 'Like', '%'.$search.'%')
                            ->orWhere('lastName', 'Like', '%'.$search.'%')
                            ->orWhere('email', 'Like', '%'.$search.'%')
                            ->paginate(20);
        return view('admin.students',[
            "students" => $student,
        ]);
    }
}
