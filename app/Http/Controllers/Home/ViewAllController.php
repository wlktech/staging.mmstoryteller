<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\Chapter;
use App\Models\Category;

class ViewAllController extends Controller
{
    public function popularSeries(){
        $popularBooks = Book::has('chapter')->withCount('order')
            ->orderBy('order_count', 'desc')
            ->orwhere('popular', '1')
            ->paginate(30);

        $mobileBooks = Book::has('chapter')->withCount('order')
            ->orderBy('order_count', 'desc')
            ->orwhere('popular', '1')
            ->paginate(18);

        return view('frontend.viewall.popular', compact('popularBooks', 'mobileBooks'));
    }

    public function newSeries(){
        $newBooks = Book::has('chapter')
        ->latest('created_at')
        ->orwhere('new', '1')
        ->paginate(30);

        $mobileBooks = Book::has('chapter')
        ->latest('created_at')
        ->orwhere('new', '1')
        ->paginate(18);

        return view('frontend.viewall.new', compact('newBooks', 'mobileBooks'));
    }

    public function latestSeries(){
        $latestChapters = Chapter::latest()->get();
        $latestBookIds = $latestChapters->pluck('book_id')->toArray();

        $latestBooks = Book::whereIn('id', $latestBookIds)
        ->has('chapter')
        ->distinct()
        ->latest()
        ->paginate(30);

        $mobileBooks = Book::whereIn('id', $latestBookIds)
        ->has('chapter')
        ->distinct()
        ->latest()
        ->paginate(18);

        return view('frontend.viewall.latest', compact('latestBooks', 'mobileBooks'));
    }

    //category filter



    public function fanSeries(){
        $fanBooks = Book::with('category')->whereHas('category', function($query){
            $query->where('name', 'Fanfic');
        })
        ->latest('created_at')
        ->paginate(30);

        $mobileBooks = Book::with('category')->whereHas('category', function($query){
            $query->where('name', 'Fanfic');
        })
        ->latest('created_at')
        ->paginate(18);

        return view('frontend.viewall.category.fan', compact('fanBooks', 'mobileBooks'));
    }

}
