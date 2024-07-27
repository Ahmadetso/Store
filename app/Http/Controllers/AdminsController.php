<?php

namespace App\Http\Controllers;
use App\Models\Book;
use App\Models\Author;
use App\Models\Category;
use App\Models\Publisher;
use Illuminate\Http\Request;

class AdminsController extends Controller
{
    public function index()
    {
        $books_count = Book::count();
        $cats_count = Category::count();
        $authors_count = Author::count();
        $pubs_count = Publisher::count();

        return view('admin.index', compact('books_count', 'cats_count', 'authors_count', 'pubs_count'));
    }
}
