<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Branch;
use App\Models\StudentCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function home()
    {
        $books = Book::latest()->paginate(20);
        return view('student.home', [
            "books" => $books
        ]);
    }

    public function redirects()
    {
        $books = Book::latest()->paginate(20);

        if (Auth::check()) {
            if (auth()->user()->userType == '1') {
                return view('layouts.adminhome');
            } else {
                return view('student.home', [
                    "books" => $books
                ]);
            }
        } else {
            return redirect("/");
        }

    }

    public function index()
    {
        return view("login");
    }

    public function stu_bookSearch()
    {
        $category = Book::join('categories', 'books.category_id', '=', 'categories.id')->get("name");
        // $category = Category::join('books', 'books.category_id', '=', 'categories.id')->get("name");
        // print_r($category);
        $search = request()->search;
        $book = Book::where('title', 'Like', '%'.$search.'%')
                    ->orWhere('author', 'Like', '%'.$search.'%')
                    // ->orWhere($category, 'Like', '%'.$search.'%')
                    ->paginate(20);

        return view('student.home', [
            "books" => $book
        ]);
    }

    public function author()
    {
        $books = Book::latest()->paginate(20);
        return view('student.author', [
            "books" => $books
        ]);
    }

    public function subtract($id)
    {
        $avail = Book::find($id);
        $avail->available -= 1;
        $avail->save();

        return back();
    }
}
