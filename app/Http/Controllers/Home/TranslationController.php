<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\Chapter;
use App\Models\Category;

class TranslationController extends Controller
{
    public function all(){
        $books = Book::has('chapter')->whereHas('category', function($query){
            $query->where('name', 'Translation');
        })
        ->latest('created_at')
        ->paginate(30);

        $mobilebooks = Book::has('chapter')->whereHas('category', function($query){
            $query->where('name', 'Translation');
        })
        ->latest('created_at')
        ->paginate(18);

        return view('frontend.viewall.translation.all', compact('books', 'mobilebooks'));
    }

    public function popular(){
        $books = Book::has('chapter')->with('category')->whereHas('category', function($query){
            $query->where('name', 'Translation');
        })
        ->has('chapter')
        ->withCount('order')
        ->orderBy('order_count', 'desc')
        ->latest('created_at')
        ->paginate(30);

        $mobilebooks = Book::has('chapter')->with('category')->whereHas('category', function($query){
            $query->where('name', 'Translation');
        })
        ->has('chapter')
        ->withCount('order')
        ->orderBy('order_count', 'desc')
        ->latest('created_at')
        ->paginate(18);

        return view('frontend.viewall.translation.popular', compact('books', 'mobilebooks'));
    }

    public function complete(){
        $books = Book::has('chapter')->with('category')->whereHas('category', function($query){
            $query->where('name', 'Translation');
        })
        ->has('chapter')
        ->where('status', 'COMPLETED')
        ->latest('created_at')
        ->paginate(30);

        $mobilebooks = Book::has('chapter')->with('category')->whereHas('category', function($query){
            $query->where('name', 'Translation');
        })
        ->has('chapter')
        ->where('status', 'COMPLETED')
        ->latest('created_at')
        ->paginate(18);

        return view('frontend.viewall.translation.complete', compact('books', 'mobilebooks'));
    }

    public function newest(){
        $books = Book::has('chapter')->with('category')->whereHas('category', function($query){
            $query->where('name', 'Translation');
        })
        ->has('chapter')
        ->latest('created_at')
        ->paginate(30);

        $mobilebooks = Book::has('chapter')->with('category')->whereHas('category', function($query){
            $query->where('name', 'Translation');
        })
        ->has('chapter')
        ->latest('created_at')
        ->paginate(18);
        // return $books;
        return view('frontend.viewall.translation.newest', compact('books', 'mobilebooks'));
    }

    public function oldest(){
        $books = Book::has('chapter')->with('category')->whereHas('category', function($query){
            $query->where('name', 'Translation');
        })
        ->has('chapter')
        ->orderBy('created_at', 'asc')
        ->paginate(30);

        $mobilebooks = Book::has('chapter')->with('category')->whereHas('category', function($query){
            $query->where('name', 'Translation');
        })
        ->has('chapter')
        ->orderBy('created_at', 'asc')
        ->paginate(18);
        // return $books;
        return view('frontend.viewall.translation.oldest', compact('books', 'mobilebooks'));
    }
}
