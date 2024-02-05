<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\Chapter;
use App\Models\Category;

class FanficController extends Controller
{
    public function all(){
        $books = Book::has('chapter')->whereHas('category', function($query){
            $query->where('name', 'Fanfic');
        })
        ->latest('created_at')
        ->paginate(30);

        $mobilebooks = Book::has('chapter')->whereHas('category', function($query){
            $query->where('name', 'Fanfic');
        })
        ->latest('created_at')
        ->paginate(18);

        return view('frontend.viewall.fanfic.all', compact('books', 'mobilebooks'));
    }

    public function popular(){
        $books = Book::has('chapter')->with('category')->whereHas('category', function($query){
            $query->where('name', 'Fanfic');
        })
        ->has('chapter')
        ->withCount('order')
        ->orderBy('order_count', 'desc')
        ->latest('created_at')
        ->paginate(30);

        $mobilebooks = Book::has('chapter')->with('category')->whereHas('category', function($query){
            $query->where('name', 'Fanfic');
        })
        ->has('chapter')
        ->withCount('order')
        ->orderBy('order_count', 'desc')
        ->latest('created_at')
        ->paginate(18);

        return view('frontend.viewall.fanfic.popular', compact('books', 'mobilebooks'));
    }

    public function complete(){
        $books = Book::has('chapter')->with('category')->whereHas('category', function($query){
            $query->where('name', 'Fanfic');
        })
        ->has('chapter')
        ->where('status', 'COMPLETED')
        ->latest('created_at')
        ->paginate(30);

        $mobilebooks = Book::has('chapter')->with('category')->whereHas('category', function($query){
            $query->where('name', 'Fanfic');
        })
        ->has('chapter')
        ->where('status', 'COMPLETED')
        ->latest('created_at')
        ->paginate(18);

        return view('frontend.viewall.fanfic.complete', compact('books', 'mobilebooks'));
    }

    public function newest(){
        $books = Book::has('chapter')->with('category')->whereHas('category', function($query){
            $query->where('name', 'Fanfic');
        })
        ->has('chapter')
        ->latest('created_at')
        ->paginate(30);

        $mobilebooks = Book::has('chapter')->with('category')->whereHas('category', function($query){
            $query->where('name', 'Fanfic');
        })
        ->has('chapter')
        ->latest('created_at')
        ->paginate(18);
        // return $books;
        return view('frontend.viewall.fanfic.newest', compact('books', 'mobilebooks'));
    }

    public function oldest(){
        $books = Book::has('chapter')->with('category')->whereHas('category', function($query){
            $query->where('name', 'Fanfic');
        })
        ->has('chapter')
        ->orderBy('created_at', 'asc')
        ->paginate(30);

        $mobilebooks = Book::has('chapter')->with('category')->whereHas('category', function($query){
            $query->where('name', 'Fanfic');
        })
        ->has('chapter')
        ->orderBy('created_at', 'asc')
        ->paginate(18);
        // return $books;
        return view('frontend.viewall.fanfic.oldest', compact('books', 'mobilebooks'));
    }
}
