<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;
    public function authors(){
        return $this->belongsToMany(Author::class, 'books_authors');
    }
    public function category(){
        return $this->belongsTo(Category::class);
    }
    public function publisher(){
        return $this->belongsTo(Publisher::class);
    }
    public function owners(){
        return $this->belongsToMany(User::class, 'books_users');
    }
}
