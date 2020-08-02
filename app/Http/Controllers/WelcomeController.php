<?php

namespace App\Http\Controllers;

use App\Author;
use App\Book;
use App\Category;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function index(){
        $latest_books  = Book::latest()->limit(6)->get();
        $categories = Category::with('books')->withCount('books')->get();
        $authors = Author::all();
        $books = Book::with('categories')->OrderBy('id', 'desc')->take(6)->get();

        return view('site.index', compact('latest_books' ,'categories','authors','books'));
    }
}
