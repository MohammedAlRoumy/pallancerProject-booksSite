<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Book extends Model
{
    protected $fillable = ['name', 'description', 'file', 'poster', 'year'];

    public function categories()
    {
        return $this->belongsToMany(Category::class, 'book_category');
    }

    public function users()
    {
        return $this->belongsToMany(User::class, 'user_book');
    }

    public function authors()
    {
        return $this->belongsToMany(Author::class, 'book_author');
    }

    protected $appends = ['poster_path','file_path', 'is_favored'];


    public function getPosterPathAttribute()
    {
        return Storage::url('images/' . $this->poster);
    }

    public function getFilePathAttribute()
    {
        return Storage::url('books/' . $this->file);
    }

    public function getIsFavoredAttribute()
    {
        if (auth()->user()) {
            return (bool)$this->users()->where('user_id', auth()->user()->id)->count();
        }
        return false;
    }

    public function scopeWhenSearch($query, $search)
    {
        return $query->when($search, function ($q) use ($search) {
            return $q->where('name', 'like', "%$search%")
                ->orWhere('description', 'like', "%$search%")
                ->orWhere('year', 'like', "%$search%");
        });

    }// end of scopeWhenSearch

    public function scopeWhenCategory($query, $category)
    {
        return $query->when($category, function ($q) use ($category) {

            return $q->whereHas('categories', function ($qu) use ($category) {

                return $qu->whereIn('category_id', (array)$category)
                    ->orWhereIn('name', (array)$category);

            });

        });

    }// end of scopeWhenCategory

    public function scopeWhenAuthor($query, $author)
    {
        return $query->when($author, function ($q) use ($author) {

            return $q->whereHas('authors', function ($qu) use ($author) {

                return $qu->whereIn('author_id', (array)$author)
                    ->orWhereIn('name', (array)$author);

            });

        });

    }// end of scopeWhenCategory

    public function scopeWhenFavorite($query, $favorite)
    {
        return $query->when($favorite, function ($q) {

            return $q->whereHas('users', function ($qu) {

                return $qu->where('user_id', auth()->user()->id);
            });

        });

    }// end of scopeWhenFavorite

}
