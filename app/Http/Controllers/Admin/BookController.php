<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Book;
use App\Models\Category;
use App\Models\Chapter;
use App\Models\Genre;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class BookController extends Controller
{
    //book lists
    public function index(){
        $perPage = 10;
        $currentPage = request()->get('page', 1);
        $no = ($currentPage - 1) * $perPage + 1;

        $all = Book::latest()->get();
        $books = Book::latest()->paginate($perPage);
        $categories = Category::all();
        $genres = Genre::distinct()->get();
        $users = User::where('role', "Author")->orWhere('role', "Super Admin")->get();
        // return $books;
        return view('backend.books.index', compact('books', 'no', 'categories', 'genres', 'all', 'users'));
    }

    public function searchByTitle(Request $request){
        if(!$request->title){
            return redirect('/admin/book/');
        }else{
            $perPage = 10;
            $currentPage = request()->get('page', 1);
            $no = ($currentPage - 1) * $perPage + 1;
            $title = $request->title;

            $all = Book::where('title', 'like', '%'.$title.'%')->latest()->get();
            $books = Book::where('title', 'like', '%'.$title.'%')->latest()->get();
            $categories = Category::all();
            $genres = Genre::distinct()->get();
            $users = User::where('role', "Author")->orWhere('role', "Super Admin")->get();
            // return $books;
            return view('backend.books.search', compact('books', 'categories', 'no','genres', 'all', 'title', 'users'));
        }
    }

    public function searchByDate(Request $request){
        if(!$request->start || !$request->end){
            return redirect('/admin/book/');
        }else{
            $perPage = 10;
            $currentPage = request()->get('page', 1);
            $no = ($currentPage - 1) * $perPage + 1;

            $start = $request->start;
            $end = $request->end;

            $all = Book::whereBetween('created_at', [$start, $end])->latest()->get();
            $books = Book::whereBetween('created_at', [$start, $end])->latest()->get();
            $categories = Category::all();
            $genres = Genre::distinct()->get();
            $users = User::where('role', "Author")->orWhere('role', "Super Admin")->get();
            // return $books;
            return view('backend.books.search', compact('books', 'categories', 'no','genres', 'all', 'start', 'end', 'users'));
        }
    }

    public function searchByAuthor(Request $request){
        if(!$request->user_id){
            return redirect('/admin/book/');
        }else{
            $perPage = 10;
            $currentPage = request()->get('page', 1);
            $no = ($currentPage - 1) * $perPage + 1;

            $userId = $request->user_id;
            $username = User::find($userId);

            $all = Book::where('user_id', $userId)->latest()->get();
            $books = Book::where('user_id', $userId)->latest()->get();
            $categories = Category::all();
            $genres = Genre::distinct()->get();
            $users = User::where('role', "Author")->orWhere('role', "Super Admin")->get();
            // return $books;
            return view('backend.books.search', compact('books', 'categories', 'no','genres', 'all', 'users', 'username'));
        }
    }

    //create
    public function create(){
        $categories = Category::all();
        $genres = Genre::all();
        return view('backend.books.create', compact('categories', 'genres'));
    }
    public function upload(Request $request){
        $request->validate([
            'title' => 'required|string',
            'image' => 'required|file|mimes:jpeg,png,jpg|dimensions:width=1050,height=1650|max:3000',
            'category_id' => 'required',
            'genre_id' => 'required',
            'description' => 'required',
        ]);
        // image
        $image = $request->file('image');
        $ext = $image->getClientOriginalExtension();
        $filename = uniqid('book') . '.' . $ext; // Generate a unique filename
        $image->move(public_path('assets/img/book/'), $filename); // Save the file to the pub

        $book = Book::create([
            'title' => $request->title,
            'image' => $filename,
            'category_id' => $request->category_id,
            'description' => $request->description,
            'user_id' => $request->user_id,
        ]);

        $genres = [];
        foreach($request->genre_id as $g){
            $genre = Genre::where('id', $g)->first();
            if(!$genre){
                return redirect()->back()->with('error', "Genre Not Found!");
            }
            $genres[] = $genre->id;
        }
        $b = Book::find($book->id);
        $b->genre()->sync($genres);

        return redirect('/admin/book/')->with('success', "New Book Created.");
    }

    public function imgStore(Request $request)
    {
        $folderPath = public_path('assets/img/book/');
 
        $image_parts = explode(";base64,", $request->image);
        $image_type_aux = explode("image/", $image_parts[0]);
        $image_type = $image_type_aux[1];
        $image_base64 = base64_decode($image_parts[1]);
 
        $imageName = uniqid() . '.png';
 
        $imageFullPath = $folderPath.$imageName;
 
        file_put_contents($imageFullPath, $image_base64);
 
         $saveFile = new Book;
         $saveFile->image = $imageName;
         $saveFile->user_id = Auth::user()->id;
         $saveFile->save();
    
        return response()->json(['success'=>'Crop Image Uploaded Successfully']);
    }

    public function imgUpdate(Request $request, $id)
    {
        $book_img = Book::find($id);
        //remove book-img from localstorage
        File::delete(public_path('assets/img/book/'.$book_img->image));
        // //cropping code start
        $folderPath = public_path('assets/img/book/');

        // // Ensure the directory exists and is writable
        if (!File::isDirectory($folderPath)) {
            File::makeDirectory($folderPath, 0775, true, true);
        }

        $image_parts = explode(";base64,", $request->image);
        $image_type_aux = explode("image/", $image_parts[0]);
        $image_type = $image_type_aux[1];
        $image_base64 = base64_decode($image_parts[1]);

        $imageName = uniqid() . '.png';
        $imageFullPath = $folderPath . $imageName;

        file_put_contents($imageFullPath, $image_base64);
        // //cropping code end

        $book_img->image = $imageName;
        $book_img->user_id = Auth::user()->id;
        $book_img->save();
        return response()->json(['success' => 'Crop Image Saved/Uploaded Successfully']);
    }

    public function store(Request $request){
        $request->validate([
            'title' => 'required|string',
            'category_id' => 'required',
            'genre_id' => 'required',
            'description' => 'required',
        ]);

        $book = Book::where('user_id', Auth::user()->id)->latest()->first();
        $book->update([
            'title' => $request->title,
            'category_id' => $request->category_id,
            'description' => $request->description,
            'user_id' => Auth::user()->id,
        ]);

        $genres = [];
        foreach($request->genre_id as $g){
            $genre = Genre::where('id', $g)->first();
            if(!$genre){
                return redirect()->back()->with('error', "Genre Not Found!");
            }
            $genres[] = $genre->id;
        }
        $b = Book::find($book->id);
        $b->genre()->sync($genres);

        return redirect('/admin/book/')->with('success', "New Book Created.");
    }

    // public function store(Request $request)
    // {
    //     // Validate request data
    //     $request->validate([
    //         'title' => 'required|string',
    //         'category_id' => 'required',
    //         'genre_id' => 'required|array', // Ensure genre_id is sent as an array
    //         'description' => 'required',
    //         'image' => 'required|string', // Validate image as a base64 string
    //     ]);

    //     // Attempt to decode and save the book image
    //     $folderPath = public_path('assets/img/book/');
    //     if (!File::isDirectory($folderPath)) {
    //         File::makeDirectory($folderPath, 0775, true, true);
    //     }
    //     $image_parts = explode(";base64,", $request->image);
    //     $image_type_aux = explode("image/", $image_parts[0]);
    //     $image_type = $image_type_aux[1];
    //     $image_base64 = base64_decode($image_parts[1]);
    //     $imageName = uniqid() . '.png';
    //     $imageFullPath = $folderPath . $imageName;
    //     file_put_contents($imageFullPath, $image_base64);

    //     // Create the book with the user and image data
    //     $book = new Book;
    //     $book->title = $request->title;
    //     $book->category_id = $request->category_id;
    //     $book->description = $request->description;
    //     $book->user_id = Auth::user()->id; // Assuming the user is authenticated
    //     $book->image = $imageName; // Save the image name/path as needed
    //     $book->save();

    //     // Handle genres
    //     $genres = $request->genre_id;
    //     foreach ($genres as $genreId) {
    //         $genre = Genre::find($genreId);
    //         if (!$genre) {
    //             // Optionally handle the error, e.g., log it or throw an exception
    //         }
    //     }
    //     $book->genres()->sync($genres); // Assuming the relationship is named `genres` in the Book model

    //     return redirect('/admin/book/')->with('success', "New Book Created.");
    // }

    //view
    public function view($id){
        $perPage = 10;
        $currentPage = request()->get('page', 1);
        $no = ($currentPage - 1) * $perPage + 1;

        $book = Book::find($id);
        $all = $book->chapter()->latest()->get();
        $chapters = $book->chapter()->latest()->paginate($perPage);

        return view('backend.books.view', compact('book', 'chapters', 'no', 'all'));
    }

    public function edit($id){
        $book = Book::find($id);
        $categories = Category::all();
        $genres = Genre::all();
        // return $book;
        if($book->user_id == auth()->user()->id){
            return view('backend.books.edit', compact('book', 'categories', 'genres'));
        }else{
            return view('backend.books.editPhoto', compact('book'));
        }
    }

    //update
    public function update(Request $request, $id){
        $book = Book::find($id);
        if($book->user_id == auth()->user()->id){
            $request->validate([
                'title' => 'required',
                'category_id' => 'required',
                'status' => 'required',
                'description' => 'required',
            ]);
            if(!$request->file('image')){
                $filename = $book->image;
            }else{
                $request->validate([
                    'title' => 'required|string',
                    'image' => 'required|file|mimes:jpeg,png,jpg|dimensions:width=1050,height=1650|max:3000',
                    'category_id' => 'required',
                    'status' => 'required',
                    'description' => 'required',
                ]);
                //remove book-img from localstorage
                File::delete(public_path('assets/img/book/'.$book->image));
                // image
                $image = $request->file('image');
                $ext = $image->getClientOriginalExtension();
                $filename = uniqid('book') . '.' . $ext; // Generate a unique filename
                $image->move(public_path('assets/img/book/'), $filename); // Save the file to the pub
            }
            $book->update([
                'title' => $request->title,
                'image' => $filename,
                'category_id' => $request->category_id,
                'description' => $request->description,
                'status' => $request->status,
            ]);
            $genres = [];
            foreach($request->genre_id as $g){
                $genre = Genre::where('id', $g)->first();
                if(!$genre){
                    return redirect()->back()->with('error', "Genre Not Found!");
                }
                $genres[] = $genre->id;
            }
            $b = Book::find($book->id);
            $b->genre()->sync($genres);
        }else{
            $request->validate([
                'image' => 'required|file|mimes:jpeg,png,jpg|dimensions:width=1050,height=1650|max:3000',
            ]);

            //remove book-img from localstorage
            File::delete(public_path('assets/img/book/'.$book->image));

            // image
            $image = $request->file('image');
            $ext = $image->getClientOriginalExtension();
            $filename = uniqid('book') . '.' . $ext; // Generate a unique filename
            $image->move(public_path('assets/img/book/'), $filename); // Save the file to the pub

            $book->update([
                'image' => $filename,
            ]);
        }
        return redirect('/admin/book/')->with('success', "Book Updated.");
    }

    //delete
    public function delete(Request $request){
        $id = $request->id;
        $book = Book::find($id);
        //remove book-img from localstorage
        File::delete(public_path('assets/img/book/'.$book->image));
        Book::destroy($id);
        $chapters = Chapter::where('book_id', $id)->get();
        foreach($chapters as $chapter){
            $chapter->delete();
        }
        return redirect('/admin/book/')->with('success', "Book Removed.");
    }

    //popular switch
    public function popular(Request $request, $id){
        Book::find($id)->update([
            'popular'=>$request->popular
        ]);
        if($request->popular == 1){
            return redirect()->back()->with('success', 'Popular Switch On');
        }else{
            return redirect()->back()->with('success', 'Popular Switch Off');
        }
    }

    //latest switch
    public function latest(Request $request, $id){
        Book::find($id)->update([
            'latest'=>$request->latest
        ]);
        if($request->latest == 1){
            return redirect()->back()->with('success', 'Latest Switch On');
        }else{
            return redirect()->back()->with('success', 'Latest Switch Off');
        }
    }

    //status switch
    public function status(Request $request, $id){
        Book::find($id)->update([
            'status'=>$request->status
        ]);
        if($request->status == 'ONGOING'){
            return redirect()->back()->with('success', 'ONGOING Switch On');
        }else{
            return redirect()->back()->with('success', 'COMPLETED Switch On');
        }
    }

    //new switch
    public function new(Request $request, $id){
        Book::find($id)->update([
            'new'=>$request->new
        ]);
        if($request->new == '0'){
            return redirect()->back()->with('success', 'New Switch Off');
        }else{
            return redirect()->back()->with('success', 'New Switch On');
        }
    }
}
