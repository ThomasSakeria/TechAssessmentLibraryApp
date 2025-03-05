<?php

use App\Http\Controllers\AdminUserController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Models\Book;
use App\Http\Controllers\BookController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\UserAccountController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\SearchBooksController;
use App\Http\Controllers\SearchController;

/*
Route::get('/', function () {
    $books = Book::all();

    foreach ($books as $book) {
        $book->image = asset("storage/{$book->coverImage}");
    }

    return Inertia::render('Welcome',[
    'books' => $books,
    ]);
});
*/
//Route::get('index', [MainController::class, 'index'])->name('index');



Route::resource('books',BookController::class);

Route::resource('category', CategoryController::class);

Route::get('login', [AuthController::class, 'create'])->name('login');

Route::post('login', [AuthController::class, 'store'])->name('login.store');

Route::delete('logout', [AuthController::class, 'destroy'])->name('logout');

Route::resource('user-account', UserAccountController::class)->only(['create','store']);

Route::resource('admin',AdminUserController::class)->only('index');

Route::get('/', [MainController::class, 'index'])->name('home');

Route::post('/checkout', [CheckoutController::class, 'checkout']);

Route::get('/checkedout', [CheckoutController::class, 'index'])->name('checkedout');

Route::post('/return-book', [CheckoutController::class, 'returnBook'])->name('returnbook');


