<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Chapter;
use App\Models\Book;
use Illuminate\Support\Facades\Auth;

class ChapterController extends Controller
{
    //chatper lists
    // public function index(){
    //     $perPage = 10;
    //     $currentPage = request()->get('page', 1);
    //     $no = ($currentPage - 1) * $perPage + 1;
    //     $chapters = Chapter::latest()->paginate($perPage);
    //     return view('backend.chapters.index', compact('chapters', 'no'));
    // }

    //create
    public function create($id){
        $novel = Book::find($id);
        $books = Book::all();
        return view('backend.chapters.create', compact('books', 'novel'));
    }
    public function store(Request $request){
        $request->validate([
            'name' => 'required',
            'book_id' => 'required',
            'full_text' => 'required',
        ]);
        Chapter::create([
            'name' => $request->name,
            'book_id' => $request->book_id,
            'full_text' => $request->full_text,
            'user_id' => $request->user_id,
            'created_at' => now(),
        ]);
        return redirect('/admin/book/view/'.$request->book_id)->with('success', 'New Chapter Created.');
    }

    //view
    public function view($id){
        $chapter = Chapter::find($id);
        $chapter->increment('view_count');
        return view('backend.chapters.view', compact('chapter'));
    }

    //edit
    public function edit($id){
        $chapter = Chapter::find($id);
        if(!$chapter){
            return redirect('/admin/chapter/')->with('error', "Data Not Found!");
        }
        $books = Book::all();
        return view('backend.chapters.edit', compact('chapter', 'books'));
    }
    public function update(Request $request, $id){
        $request->validate([
            'name' => 'required',
            'book_id' => 'required',
            'full_text' => 'required',
        ]);
        Chapter::find($id)->update([
            'name' => $request->name,
            'book_id' => $request->book_id,
            'full_text' => $request->full_text,
            'user_id' => $request->user_id,
            'updated_at' => now(),
        ]);
        return redirect('/admin/book/view/'.$request->book_id)->with('success', "Chapter Updated.");
    }

    //delete
    public function delete(Request $request, $book_id){
        $id = $request->id;
        Chapter::destroy($id);
        return redirect('/admin/book/view/'.$book_id)->with('success', "Chapter Removed.");
    }


    //paid or free status
    public function status(Request $request){
        $id = $request->id;
        Chapter::find($id)->update([
            'status'=>$request->status
        ]);
        if($request->status == "Free"){
            return redirect()->back()->with('success', 'Free Switch On');
        }else{
            return redirect()->back()->with('success', 'Paid Switch On With '.$request->status.' Gems');
        }
    }
}
