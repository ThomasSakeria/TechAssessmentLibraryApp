<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\Category;
use Inertia\Inertia;
use Illuminate\Support\Facades\Storage;

class BookController extends Controller
{
    public function index()
    {

        $books = Book::with('category')->get();
        foreach ($books as $book) {
            $book->FileUrl = Storage::url($book->coverImage);


        }
        return Inertia::render('Books/All', [
            'books' => $books,
            'categories' => Category::all(),

        ]);
    }

    public function create()
    {

        return inertia('Books/AddNew',[
            'categories' => Category::all(),
        ]);
    }


    public function store(Request $request, Book $book)
    {


        if ($request->hasFile('images')) {

            $request ->validate([
                'images.*' => ['image'],
                'title' => ['required',],
                'author' => ['required',],
                'description' => ['required',],
            ]);

           
            $path = $request->file('images')->store('images', 'public');

            Book::create(
                [
                    'title' => $request['title'],
                    'author' =>  $request['author'],
                    'description' => $request['description'],
                    'publisher' => $request['publisher'],
                    'category' => $request['category'],
                    'pageCount' => $request['pageCount'],
                    'coverImage' => $path,
                    'quantity' =>  1,
                ]
            );
            return redirect()->route('books.index');

    }
}


public function edit(Book $book){
    
    return Inertia::render('Books/EditBook',[
        'book' => $book,
        'categories' => Category::all(),
        'fileUrl' => $book->coverImage ? Storage::url($book->file): null,

    ]);

}




    public function update(Request $request, Book $book)
    {
        if ($request->hasFile('file')) {
        $request ->validate([
            'title' => [
                'required',
            ],
            'author' => [
                'required',
            ],
            'description' => [
                'required',
            ],
        ]);
    }
        $book->update($request->all());
        return redirect()->route('books.index');

    }

    
    public function destroy(Book $book)
    {
        $book->delete();
        return redirect()->route('books.index');
 
    }



    

}
