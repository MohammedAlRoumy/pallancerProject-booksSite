<?php

namespace App\Http\Controllers;

use App\Author;
use App\Book;
use App\Category;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index()
    {

        $categories = Category::all();
        $authors = Author::all();

        $books = Book::whenCategory(request()->category_name)
                        ->whenFavorite(request()->favorite)
                        ->get();

       // return view('site.partials.owl-carousel', compact('books'));
        return view('site.pages.books.index', compact('books','categories','authors'));
    }

    public function show(Book $book)
    {
        $categories = Category::all();
        //  $categories = Category::with('books')->get();
        $authors = Author::all();
        $related_books = Book::where('id','!=',$book->id)
            ->whereHas('categories',function ($query) use ($book){

                return $query->whereIn('category_id', $book->categories->pluck('id')->toArray());
            })->get();
        return view('site.pages.books.show', compact('book','related_books','categories','authors'));
    }


    public function toggle_favorite(Book $book)
    {
        $book->is_favored ? $book->users()->detach(auth()->user()->id) : $book->users()->attach(auth()->user()->id);

    }

}
