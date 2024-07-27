<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Author;
use App\Models\Category;
use App\Models\Publisher;
use App\Models\Rating;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Validation\Rule;
use App\Traits\ImageUploadTrait;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class BooksController extends Controller
{
    use ImageUploadTrait;
    /**
     * Display a listing of the resource.
     *
     */
    public function index()
    {
        $books = Book::all();
        return view('admin.books.index', compact('books'));
    }

    /**
     * Show the form for creating a new resource.
     *
     */
    public function create()
    {
        $authors = Author::all();
        $categories = Category::all();
        $publishers = Publisher::all();
        return view('admin.books.create', compact('categories', 'authors', 'publishers'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request

     */
    public function store(Request $request)
    {
        $data = $this->validate($request, [
            'title' => 'required|string|max:255',
            'isbn' => ['required', 'alpha_num', Rule::unique('books', 'isbn')],
            'image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'category_id' => 'nullable',
            'authors' => 'nullable|array',
            'publisher_id' => 'nullable',
            'body' => 'nullable|string',
            'publish_year' => 'nullable|numeric|min:1|max:' . date('Y'),
            'number_of_pages' => 'required|numeric|min:1',
            'number_of_copies' => 'required|numeric|min:1',
            'price' => 'required|numeric|min:0'
        ]);
        $data['image'] = $this->uploadImage($request->image);
        // dd($data);
        $book = Book::create($data);   
        $book->authors()->attach($request->authors);  
        session()->flash('flash_message', 'تمت إضافة الكتاب بنجاح');
        return redirect(route('books.show', $book));
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Book  $book
     */
    public function show(Book $book)
    {
        return view('admin.books.show', compact('book'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Book  $book
     */
    public function edit(Book $book)
    {
        $authors = Author::all();
        $categories = Category::all();
        $publishers = Publisher::all();
        return view('admin.books.edit', compact('book', 'categories', 'authors', 'publishers'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Book  $book
     */
    public function update(Request $request, Book $book)
    {
        $this->validate($request, [
            'title' => 'required',
            'image' => 'image',
            'category_id' => 'nullable',
            'authors' => 'nullable',
            'publisher_id' => 'nullable',
            'body' => 'nullable',
            'publish_year' => 'numeric|nullable',
            'number_of_pages' => 'numeric|required',
            'number_of_copies' => 'numeric|required',
            'price' => 'numeric|required',
        ]);


        $book->title = $request->title;
        if ($request->has('image')) {
            Storage::disk('public')->delete($book->image);
            $book->image = $this->uploadImage($request->image);
        }
        $book->isbn = $request->isbn;
        $book->category_id = $request->category_id;
        $book->publisher_id = $request->publisher_id;
        $book->body = $request->body;
        $book->publish_year = $request->publish_year;
        $book->number_of_pages = $request->number_of_pages;
        $book->number_of_copies = $request->number_of_copies;
        $book->price = $request->price;

        if ($book->isDirty('isbn')) {
            $this->validate($request, [
                'isbn' => ['required', 'alpha_num', Rule::unique('books', 'isbn')],
            ]);
        }

        $book->save();

        $book->authors()->detach();
        $book->authors()->attach($request->authors);

        session()->flash('flash_message', 'تم تعديل الكتاب بنجاح');

        return redirect(route('books.show', $book));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Book  $book
     */
    public function destroy(Book $book)
    {
        Storage::disk('public')->delete($book->image);

        $book->delete();

        session()->flash('flash_message', 'تم حذف الكتاب بنجاح');

        return redirect(route('books.index'));
    }

    public function details(Book $book)
    {
        $bookfind = 0;

        return view('books.details', compact('book', 'bookfind'));
    }


}
