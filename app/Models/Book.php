<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $fillable = [
        'name', 'isbn', 'release_date', 'number_of_pages','authors','publisher', 'country'
    ];

    public function getAuthorsAttribute()
    {
        return explode(',', $this->attributes['authors']);
    }
}
