<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Genre;

class HomeGenreController extends Controller
{
    public function index(){
        $genres = Genre::withCount('book')->get();
        // return $genres;
        return view('frontend.viewall.genre.all', compact('genres'));
    }

    public function detail($id){
        $genre = Genre::where('id', $id)->first();
        $books = $genre->book()->has('chapter')->paginate(30);
        $mobilebooks = $genre->book()->has('chapter')->paginate(18);
        // return $genre;
        return view('frontend.viewall.genre.detail', compact('genre', 'books', 'mobilebooks'));
    }
}
