<?php

namespace App\Http\Controllers\Dashboard;

use App\Author;
use App\Category;
use App\Http\Controllers\Controller;
use App\Book;
use App\User;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function index()
    {
        $users_count = User::/*whereRole('user')->*/count();
     //   $users_count = User::all()->count();
        $categories_count = Category::where('status', 1)->count();
        $books_count = Book::count();
        $authors_count = Author::count();
        return view('dashboard.welcome', compact('users_count', 'categories_count', 'books_count','authors_count'));

//        return view('dashboard.welcome');

    }// end of index
}
