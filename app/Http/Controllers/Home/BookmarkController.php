<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Bookmark;

class BookmarkController extends Controller
{
    public function add(Request $request){
        Bookmark::create([
            'user_id'=>$request->user_id,
            'book_id'=>$request->book_id,
        ]);
        return redirect()->back()->with('success', "Add To Bookmark");
    }
    public function remove(Request $request, $id){
        Bookmark::destroy($id);
        return redirect()->back()->with('success', "Remove From Bookmark");
    }
}
