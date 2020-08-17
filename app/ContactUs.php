<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ContactUs extends Model
{
    //
    protected $fillable=['title','email','content'];

    public function scopeWhenSearch($query, $search)
    {
        return $query->when($search, function ($q) use ($search) {
            return $q->where('title', 'like', "%$search%")
                ->orWhere('email', 'like', "%$search%");
        });

    }// end of scopeWhenSearch
}
