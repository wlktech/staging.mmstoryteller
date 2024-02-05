<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;
    protected $fillable = ['title', 'image', 'video', 'description'];
    protected $appends = ['preview'];


    public function getPreviewAttribute(){
        $string = substr($this->description, 0, 100);
        return $string;
    }

}
