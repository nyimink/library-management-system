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

    public function __construct()
    {
        return $this->middleware('isAdmin');
    }

    ##books
    public function bookShow()
    {
        $book = Book::latest()->paginate(20);

        return view('admin.books',[
            "books" => $book
        ]);
    }

    public function bookSearch()
    {
        $category = Book::join('categories', 'books.category_id', '=', 'categories.id')->get("name");
        // $category = Category::join('books', 'books.category_id', '=', 'categories.id')->get("name");
        // print_r($category);
        $search = request()->search;
        $book = Book::where('title', 'Like', '%'.$search.'%')
                    ->orWhere('author', 'Like', '%'.$search.'%')
                    // ->orWhere($category, 'Like', '%'.$search.'%')
                    ->paginate(20);

        return view('admin.books', [
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
        $book->available = request()->available;

        $book->save();

        return redirect('books')->with('info', 'A book is created successfully.');
    }

    ##book category
    public function categoryAdd()
    {
        $category = Category::first()->paginate(5);
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

    public function categoryEdit($id)
    {
        $category = Category::find($id);
        return view('admin.categoryedit', [
            "category" => $category
        ]);
    }

    public function categoryUpdate($id)
    {
        $validator = validator(request()->all(),[
            'name' => 'required'
        ]);

        if($validator->fails()) {
            return back()->withErrors($validator);
        }

        $category = Category::find($id);

        $category->name = request()->name;
        $category->save();

        return redirect('/category/add')->with('info', "A category is successfully updated.");
    }

    public function categoryDelete($id)
    {
        $category = Category::find($id);
        $category->delete();

        return redirect('/category/add')->with('delete', 'A category is deleted.');
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

    ##settings_branch
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

    public function branchEdit($id)
    {
        $category = StudentCategory::all();
        $branch = Branch::all();
        $branches = Branch::find($id);
        return view('admin.settingseditbranch', [
            "branches" => $branches,
            "branch" => $branch,
            "categories" => $category
        ]);
    }

    public function branchUpdate($id)
    {
        $branch = Branch::find($id);
        $branch->name = request()->branchName;
        $branch->save();

        return back()->with('info', 'A branch is updated.');
    }

    public function branchDelete($id)
    {
        $branch = Branch::find($id);
        $branch->delete();

        return redirect('/settings')->with('delete', "Branch \"$branch->name\" is deleted.");
    }
}
