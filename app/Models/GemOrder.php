<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GemOrder extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'gem_amount',
        'created_by'
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }
    public function created_by(){
        return $this->belongsTo(User::class);
    }
}
