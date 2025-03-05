<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\Category;
use Inertia\Inertia;


class MainController extends Controller
{
    public function index()
    {

        $books = Book::with('category')->get();

        foreach ($books as $book) {
            $book->image = asset("storage/{$book->coverImage}");
        }

            return Inertia::render('Welcome', [
                'books' => $books,
                'categories' => Category::all(),
            ]);
        }

    

}
