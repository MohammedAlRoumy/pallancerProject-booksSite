<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Author extends Model
{
    protected $fillable = ['name', 'bio', 'image'];

    public function books(){
        return $this->belongsToMany(Book::class,'book_author');
    }

    public function getNameAttribute($value)
    {
        return ucfirst($value);

    }//end of get  name


    public function scopeWhenSearch($query, $search)
    {
        return $query->when($search, function ($q) use ($search) {
            return $q->where('name', 'like', "%$search%");
        });

    }// end of scopeWhenSearch

    public function getImagePathAttribute()
    {
        return Storage::url('authors/' . $this->image);
    }
}
