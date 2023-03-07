<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Branch;
use App\Models\Category;
use App\Models\Student;
use App\Models\StudentCategory;
use Illuminate\Http\Request;

class AdminController extends Controller
{

    ##books
    public function bookShow()
    {
        $book = Book::latest()->paginate(30);

        return view('admin.books',[
            "books" => $book
        ]);
    }

    public function bookAdd()
    {
        $category = Category::all();
        return view('admin.booksadd',[
            'categories' => $category
        ]);
    }

    public function bookCreate()
    {
        $validator = validator(request()->all(),[
            'title' => "required",
            'author' => "required",
            'description' => "required",
            'category_id' => "required",
        ]);

        if($validator->fails()) {
            return back()->withErrors($validator);
        }

        $book = new Book;

        $book->title = request()->title;
        $book->author = request()->author;
        $book->description = request()->description;
        $book->category_id = request()->category_id;
        $book->issue = request()->issue;

        $book->save();

        return redirect('books')->with('info', 'A book is created successfully.');
    }

    ##category
    public function categoryAdd()
    {
        $category = Category::all();
        return view('admin.categoryadd', [
            "categories" => $category
        ]);
    }

    public function categoryCreate()
    {
        $validator = validator(request()->all(),[
            'name' => 'required'
        ]);

        if($validator->fails()) {
            return back()->withErrors($validator);
        }

        $category = new Category;

        $category->name = request()->name;
        $category->save();

        return back()->with('info', 'A category is added successfully.');
    }

    ##settings
    public function settings()
    {
        $category = StudentCategory::all();
        $branch = Branch::all();
        return view('admin.settings',[
            "categories" => $category,
            "branch" => $branch
        ]);
    }

    public function branchAdd()
    {
        $validator = validator(request()->all(),[
            'branchName' => 'required'
        ]);

        if($validator->fails()) {
            return back()->withErrors($validator);
        }

        $branch = new Branch;
        $branch->name = request()->branchName;
        $branch->save();

        return back()->with('info', 'A new branch is added.');
    }
}
