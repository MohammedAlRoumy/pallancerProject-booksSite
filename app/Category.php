<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['name', 'status'];

    public function books(){
        return $this->belongsToMany(Book::class,'book_category');
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
}

