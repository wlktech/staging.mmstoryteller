<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Review;
use Carbon\Carbon;

class ReviewController extends Controller
{
    public function create(Request $request){
        $request->validate([
            'comment' => 'required|string',
        ]);
        Review::create([
            'user_id' => $request->user_id,
            'book_id' => $request->book_id,
            'comment' => $request->comment,
        ]);
        return redirect()->back()->with('success', "Review Added");
    }

    public function edit(Request $request){
        $request->validate([
            'comment' => 'required'
        ]);
        $id = $request->id;
        Review::find($id)->update([
            'comment' => $request->comment,
            'created_at'=> Carbon::now('Asia/Yangon')
        ]);
        return redirect()->back()->with('success', "Review Updated");
    }

    public function delete(Request $request){
        $id = $request->id;
        Review::destroy($id);
        return redirect()->back()->with('success', 'Review Deleted');
    }
}
