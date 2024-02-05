<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable = ['book_id', 'chapter_id', 'user_id', 'gem', 'cost', 'author_percent', 'admin_percent', 'remark'];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function book(){
        return $this->belongsTo(Book::class);
    }

    public function chapter(){
        return $this->belongsTo(Chapter::class);
    }
}
