<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Genre;
use App\Models\Category;
use Illuminate\Support\Facades\File;

class GenreController extends Controller
{
    public function index(){
        $perPage = 10;
        $currentPage = request()->get('page', 1);
        $no = ($currentPage - 1) * $perPage + 1;

        $all = Genre::latest()->get();
        $genres = Genre::latest()->paginate($perPage);
        return view('backend.genres.index', compact('genres', 'no', 'all'));
    }

    public function searchByName(Request $request){
        if(!$request->name){
            return redirect('/admin/genre/');
        }else{
            $perPage = 10;
            $currentPage = request()->get('page', 1);
            $no = ($currentPage - 1) * $perPage + 1;

            $name = $request->name;

            $all = Genre::where('name', 'like', '%'.$name.'%')->latest()->get();
            $genres = Genre::where('name', 'like', '%'.$name.'%')->latest()->get();
            return view('backend.genres.search', compact('genres', 'no', 'all', 'name'));
        }
    }

    public function searchByDate(Request $request){
        if(!$request->start || !$request->end){
            return redirect('/admin/genre/');
        }else{
            $perPage = 10;
            $currentPage = request()->get('page', 1);
            $no = ($currentPage - 1) * $perPage + 1;

            $start = $request->start;
            $end = $request->end;

            $all = Genre::whereBetween('created_at', [$start, $end])->latest()->get();
            $genres = Genre::whereBetween('created_at', [$start, $end])->latest()->get();
            return view('backend.genres.search', compact('genres', 'no', 'all', 'start', 'end'));
        }
    }

    public function create(Request $request){
        if(!$request->name){
            return redirect()->back()->with('error', "Please Fill Genre First!");
        }
        if(!$request->file('image')){
            return redirect()->back()->with('error', "Please Choose Image First!");
        }

        // image
        $image = $request->file('image');
        $ext = $image->getClientOriginalExtension();
        $filename = uniqid('genre') . '.' . $ext; // Generate a unique filename
        $image->move(public_path('assets/img/genre/'), $filename); // Save the file to the pub

        Genre::create([
            'name'=>$request->name,
            'image' => $filename
        ]);
        return redirect()->back()->with('success', 'New Genre Created');
    }

    public function edit(Request $request){
        $id = $request->id;

        $genre = Genre::find($id);
        if(!$request->file('image')){
            $filename = $genre->image;
        }else{
            File::delete(public_path('assets/img/genre/'.$genre->image));
            // image
            $image = $request->file('image');
            $ext = $image->getClientOriginalExtension();
            $filename = uniqid('genre') . '.' . $ext; // Generate a unique filename
            $image->move(public_path('assets/img/genre/'), $filename); // Save the file to the pub
        }

        $genre->update([
            'name'=>$request->name,
            'image'=>$filename
        ]);
        return redirect()->back()->with('success', 'Genre Edited');
    }

    public function delete(Request $request){
        $id = $request->id;
        $genre = Genre::find($id);
        File::delete(public_path('assets/img/genre/'.$genre->image));
        Genre::destroy($id);
        return redirect()->back()->with('success', 'Genre Removed');
    }
}
