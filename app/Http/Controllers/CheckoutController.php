<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use Inertia\Inertia;

class CheckoutController extends Controller
{
    
    public function index(){
        $checkedoutBooks = Book::where('checkout', true) ->get();
        return Inertia::render('Books/CheckedOutList',[
            'books' => $checkedoutBooks
        ]);
    }
    
    
    
    public function checkout(Request $request)
    {
        $request->validate([
            'book_id' => 'required',
        ]);


        $book = Book::find($request->book_id);
        if ($book->quantity > 0  && !$book->checkout) {
            $book->decrement('quantity');
            $book->update(['checkout' => true]);
            return back()->with('message', 'Book Checked Out Successfully');
        }

        return back()->with('error','Book is either out of stock or not available');


    }

    public function returnBook(Request $request)
    {

       $request->validate([
        'book_id' => 'required',
       ]);

       $book = Book::findOrFail($request->book_id);

       if($book->checkout){
        $book->update([
            'checkout' => false,
            'quantity' => 1,
        ]);
        return redirect()->route('checkedout')->with('success', 'Book marked as Returned!');
       }
        return redirect()->back()->with('error', 'This Book is not checked out!');






    }
}
