<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\Chapter;
use App\Models\Category;

class OwnCreationController extends Controller
{
    public function all(){
        $books = Book::has('chapter')->whereHas('category', function($query){
            $query->where('name', 'Own Creation');
        })
        ->latest('created_at')
        ->paginate(30);

        $mobilebooks = Book::has('chapter')->whereHas('category', function($query){
            $query->where('name', 'Own Creation');
        })
        ->latest('created_at')
        ->paginate(18);

        return view('frontend.viewall.own_creation.all', compact('books', 'mobilebooks'));
    }

    public function popular(){
        $books = Book::has('chapter')->with('category')->whereHas('category', function($query){
            $query->where('name', 'Own Creation');
        })
        ->has('chapter')
        ->withCount('order')
        ->orderBy('order_count', 'desc')
        ->latest('created_at')
        ->paginate(30);

        $mobilebooks = Book::has('chapter')->with('category')->whereHas('category', function($query){
            $query->where('name', 'Own Creation');
        })
        ->has('chapter')
        ->withCount('order')
        ->orderBy('order_count', 'desc')
        ->latest('created_at')
        ->paginate(18);

        return view('frontend.viewall.own_creation.popular', compact('books', 'mobilebooks'));
    }

    public function complete(){
        $books = Book::has('chapter')->with('category')->whereHas('category', function($query){
            $query->where('name', 'Own Creation');
        })
        ->has('chapter')
        ->where('status', 'COMPLETED')
        ->latest('created_at')
        ->paginate(30);

        $mobilebooks = Book::has('chapter')->with('category')->whereHas('category', function($query){
            $query->where('name', 'Own Creation');
        })
        ->has('chapter')
        ->where('status', 'COMPLETED')
        ->latest('created_at')
        ->paginate(18);

        return view('frontend.viewall.own_creation.complete', compact('books', 'mobilebooks'));
    }

    public function newest(){
        $books = Book::has('chapter')->with('category')->whereHas('category', function($query){
            $query->where('name', 'Own Creation');
        })
        ->has('chapter')
        ->latest('created_at')
        ->paginate(30);

        $mobilebooks = Book::has('chapter')->with('category')->whereHas('category', function($query){
            $query->where('name', 'Own Creation');
        })
        ->has('chapter')
        ->latest('created_at')
        ->paginate(18);
        // return $books;
        return view('frontend.viewall.own_creation.newest', compact('books', 'mobilebooks'));
    }

    public function oldest(){
        $books = Book::has('chapter')->with('category')->whereHas('category', function($query){
            $query->where('name', 'Own Creation');
        })
        ->has('chapter')
        ->orderBy('created_at', 'asc')
        ->paginate(30);

        $mobilebooks = Book::has('chapter')->with('category')->whereHas('category', function($query){
            $query->where('name', 'Own Creation');
        })
        ->has('chapter')
        ->orderBy('created_at', 'asc')
        ->paginate(18);
        // return $books;
        return view('frontend.viewall.own_creation.oldest', compact('books', 'mobilebooks'));
    }

}
