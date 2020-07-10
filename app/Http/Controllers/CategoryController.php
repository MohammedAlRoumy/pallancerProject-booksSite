<?php

namespace App\Http\Controllers;

use App\Author;
use App\Book;
use App\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    //
    public function index(){
        $categories = Category::all();
      //  $categories = Category::with('books')->get();
        $authors = Author::all();
       // $books = Book::with('categories')->OrderBy('id', 'desc')->get();

        return view('site.pages.categories.categories', compact('categories', 'authors'/*, 'books'*/));
    }

  /*  public function authors(){
            $categories = Category::all();
            //  $categories = Category::with('books')->get();
            $authors = Author::all();
            // $books = Book::with('categories')->OrderBy('id', 'desc')->get();

            return view('site.pages.authors.authors', compact('categories', 'authors'));
        }*/
}
