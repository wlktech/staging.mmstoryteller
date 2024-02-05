<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'image',
        'status',
        'genre_id',
        'category_id',
        'description',
        'new',
        'popular',
        'latest',
        'user_id'
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }
    public function category(){
        return $this->belongsTo(Category::class);
    }
    public function genre(){
        return $this->belongsToMany(Genre::class, 'book_genre');
    }
    public function chapter(){
        return $this->hasMany(Chapter::class);
    }
    public function order(){
        return $this->hasMany(Order::class);
    }
    public function review(){
        return $this->hasMany(Review::class);
    }
    public function bookmark(){
        return $this->hasMany(Bookmark::class);
    }
}
