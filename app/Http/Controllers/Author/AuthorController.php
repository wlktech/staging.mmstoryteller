<?php

namespace App\Http\Controllers\Author;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\Category;
use App\Models\Genre;
use App\Models\Chapter;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use App\Exports\Author\AuthorDateBetweenRecord;
use App\Exports\Author\TitleDateBetweenRecord;
use Maatwebsite\Excel\Facades\Excel;

class AuthorController extends Controller
{
    public function index(){
        $orderSum = Order::with('chapter')->whereHas('chapter', function($query){
            $query->where('user_id', Auth::user()->id);
        })->get();
        return view('author.dashboard', compact('orderSum'));
    }

    //novel CRUD
    public function novels(){
        $perPage = 10;
        $currentPage = request()->get('page', 1);
        $no = ($currentPage - 1) * $perPage + 1;

        $query = Book::where('user_id', Auth::user()->id)->latest();
        $all = $query->get();
        $novels = $query->paginate($perPage);

        $categories = Category::all();
        $genres = Genre::distinct()->get();

        // return $all->count();

        return view('author.novels.index', compact('novels', 'no', 'all'));
    }
    public function searchByTitle(Request $request){
        if(!$request->title){
            return redirect('/author/novels');
        }else{
            $perPage = 10;
            $currentPage = request()->get('page', 1);
            $no = ($currentPage - 1) * $perPage + 1;

            $title = $request->title;

            $query = Book::where('title', 'like', '%'.$title.'%')->where('user_id', Auth::user()->id)->latest();
            $all = $query->get();
            $novels = $query->get();

            $categories = Category::all();
            $genres = Genre::distinct()->get();

            return view('author.novels.search', compact('novels', 'no', 'all', 'title'));
        }
    }
    public function searchByDate(Request $request){
        if(!$request->start || !$request->end){
            return redirect('/author/novels');
        }else{
            $perPage = 10;
            $currentPage = request()->get('page', 1);
            $no = ($currentPage - 1) * $perPage + 1;

            $start = $request->start;
            $end = $request->end;

            $query = Book::whereBetween('created_at', [$start, $end])->where('user_id', Auth::user()->id)->latest();
            $all = $query->get();
            $novels = $query->get();

            $categories = Category::all();
            $genres = Genre::distinct()->get();

            return view('author.novels.search', compact('novels', 'no', 'all', 'start', 'end'));
        }
    }

    public function create(){
        $categories = Category::all();
        $genres = Genre::all();
        return view('author.novels.create', compact('categories', 'genres'));
    }
    public function store(Request $request){
        $request->validate([
            'title' => 'required|string',
            // 'image' => 'required|file|mimes:jpeg,png,jpg|dimensions:width=1050,height=1650|max:3000',
            'category_id' => 'required',
            'genre_id' => 'required',
            'description' => 'required|string',
        ]);

        $book = Book::where('user_id', Auth::user()->id)->latest()->first();
        $book->update([
            'title' => $request->title,
            'category_id' => $request->category_id,
            'description' => $request->description,
            'user_id' => Auth::user()->id
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

        return redirect('/author/novels')->with('success', 'Novel Created Successfully.');
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
 
        $image_parts = explode(";base64,", $request->image);
        $image_type_aux = explode("image/", $image_parts[0]);
        $image_type = $image_type_aux[1];
        $image_base64 = base64_decode($image_parts[1]);
 
        $imageName = uniqid() . '.png';
 
        $imageFullPath = $folderPath.$imageName;
 
        file_put_contents($imageFullPath, $image_base64);

        $book_img->image = $imageName;
        $book_img->save();
    
        return response()->json(['success'=>'Crop Image Updated Successfully']);
    }

    public function status(Request $request, $id){
        Book::find($id)->update([
            'status' => $request->status
        ]);
        if($request->status == "ONGOING"){
            return redirect()->back()->with('success', "ONGOING Status Changed.");
        }else{
            return redirect()->back()->with('success', "COMPLETED Status Changed.");
        }

    }
    public function edit($id){
        $categories = Category::all();
        $genres = Genre::all();
        $novel = Book::find($id);
        return view('author.novels.edit', compact('categories', 'genres', 'novel'));
    }
    public function update(Request $request, $id){
        $request->validate([
            'title' => 'required',
            'category_id' => 'required',
            'genre_id' => 'required',
            'status' => 'required',
            'description' => 'required|string',
        ]);
        $novel = Book::find($id);

        if(!$request->file('image')){
            $filename = $novel->image;
        }else{
            $request->validate([
                'title' => 'required',
                'image' => 'required|file|mimes:jpeg,png,jpg|dimensions:width=1050,height=1650|max:3000',
                'category_id' => 'required',
                'genre_id' => 'required',
                'status' => 'required',
                'description' => 'required|string',
            ]);
            //remove book-img from localstorage
            File::delete(public_path('assets/img/book/'.$novel->image));
            // image
            $image = $request->file('image');
            $ext = $image->getClientOriginalExtension();
            $filename = uniqid('book') . '.' . $ext; // Generate a unique filename
            $image->move(public_path('assets/img/book/'), $filename); // Save the file to the pub
        }
        $novel->update([
            'title' => $request->title,
            'image' => $filename,
            'category_id' => $request->category_id,
            'status' => $request->status,
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
        $b = Book::find($novel->id);
        $b->genre()->sync($genres);

        return redirect('/author/novels/')->with('success', "Novel Updated.");
    }
    public function view($id){
        $novel = Book::find($id);

        $perPage = 10;
        $currentPage = request()->get('page', 1);
        $no = ($currentPage - 1) * $perPage + 1;

        $query = Chapter::where('book_id', $id)->latest();
        $all = $query->get();
        $chapters = $query->paginate($perPage);

        return view('author.novels.view', compact('novel', 'chapters', 'no', 'all'));
    }
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
        return redirect('/author/novels/')->with('success', "Novel Removed.");
    }

    //chapter CRUD
    public function chapterCreate($id){
        $books = Book::where('user_id', Auth::user()->id)->latest()->get();
        return view('author.chapters.create', compact('books', 'id'));
    }
    public function chapterStore(Request $request){
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
        $book = Book::where('id', $request->book_id)->first();
        return redirect('/author/novels/view/'.$book->id)->with('success', "Chapter Added");
    }
    public function chapterView($id){
        $chapter = Chapter::find($id);
        return view('author.chapters.view', compact('chapter'));
    }
    public function chapterEdit($id){
        $chapter = Chapter::find($id);
        $books = Book::all();
        return view('author.chapters.edit', compact('chapter', 'books'));
    }
    public function chapterUpdate(Request $request, $id){
        $request->validate([
            'name' => 'required',
            'book_id' => 'required',
            'full_text' => 'required',
        ]);
        $chapter = Chapter::find($id);
        $chapter->update([
            'name' => $request->name,
            'book_id' => $request->book_id,
            'full_text' => $request->full_text,
            'user_id' => $request->user_id,
            'updated_at' => now(),
        ]);
        return redirect('/author/novels/view/'.$chapter->book_id)->with('success', "Chapter Updated.");
    }
    public function chapterDelete(Request $request, $book_id){
        $id = $request->id;
        $chapter = Chapter::find($id);
        Chapter::destroy($id);
        return redirect('/author/novels/view/'.$book_id)->with('success', "Chapter Deleted.");
    }
    public function chapterStatus(Request $request){
        $request->validate([
            'status'=>'required'
        ]);
        $id = $request->id;
        $chapter = Chapter::find($id);
        $chapter->update([
            'status' => $request->status
        ]);
        return redirect('/author/novels/view/'.$chapter->book_id)->with('success', "Chapter Pricing Completed.");
    }

    //order lists
    public function orders(){
        $perPage = 10;
        $currentPage = request()->get('page', 1);
        $no = ($currentPage - 1) * $perPage + 1;

        $query = Order::with('chapter')->whereHas('chapter', function($query){
            $query->where('user_id', Auth::user()->id);
        })->latest();

        $years = Order::selectRaw('YEAR(created_at) as year')->distinct()->get();

        $all = $query->get();

        $orders = $query->paginate($perPage);

        $books = Book::where('user_id', Auth::user()->id)->latest()->get();

        // return $orders;
        return view('author.orders.index', compact('orders', 'no', 'all', 'years', 'books'));
    }
    public function filter(Request $request){
        if(!$request->month || !$request->year){
            return redirect('/author/orders/');
        }else{
            $month = $request->month;
            $year = $request->year;

            $perPage = 10;
            $currentPage = request()->get('page', 1);
            $no = ($currentPage - 1) * $perPage + 1;

            $query = Order::with('chapter')->whereHas('chapter', function($query){
                $query->where('user_id', Auth::user()->id);
            })->whereMonth('created_at', '=', $month)->whereYear('created_at', '=', $year)
            ->latest();

            $years = Order::selectRaw('YEAR(created_at) as year')->distinct()->get();

            $all = $query->get();

            $orders = $query->paginate($perPage);
            $books = Book::where('user_id', Auth::user()->id)->latest()->get();

            return view('author.orders.index', compact('orders', 'no', 'all', 'years', 'month', 'year', 'books'));
        }

    }
    public function filterDateBetween(Request $request){
        if(!$request->start || !$request->end){
            return redirect('/author/orders/');
        }else{
            $start = $request->start;
            $end = $request->end;

            $perPage = 10;
            $currentPage = request()->get('page', 1);
            $no = ($currentPage - 1) * $perPage + 1;

            $query = Order::with('chapter')->whereHas('chapter', function($query){
                $query->where('user_id', Auth::user()->id);
            })->whereBetween('created_at', [$start, $end])->latest();

            $all = $query->get();

            $orders = $query->get();
            $books = Book::where('user_id', Auth::user()->id)->latest()->get();

            return view('author.orders.search', compact('orders', 'no', 'all', 'start', 'end', 'books'));
        }

    }

    public function titleDateBetween(Request $request){
        if(!$request->novel_id || !$request->start || !$request->end){
            return redirect('/author/orders/');
        }else{
            $novelId = $request->novel_id;
            $start = $request->start;
            $end = $request->end;

            $perPage = 10;
            $currentPage = request()->get('page', 1);
            $no = ($currentPage - 1) * $perPage + 1;

            $query = Order::with('chapter')->whereHas('chapter', function($query){
                $query->where('user_id', Auth::user()->id);
            })->where('book_id', $novelId)->whereBetween('created_at', [$start, $end])->latest();

            $all = $query->get();

            $orders = $query->get();
            $books = Book::where('user_id', Auth::user()->id)->latest()->get();
            $novel = Book::find($request->novel_id);

            return view('author.orders.search', compact('orders', 'no', 'all', 'start', 'end', 'books', 'novel'));
        }

    }

    public function filterDateBetweenRecord(Request $request){
        if(!$request->start || !$request->end){
            return redirect('/author/orders/');
        }else{
            $userId = Auth::user()->id;
            $start = $request->start;
            $end = $request->end;
            $export = new AuthorDateBetweenRecord($userId, $start, $end);
            return Excel::download($export, $start.' to '.$end.' Report for '.Auth::user()->name.'.xlsx');
        }
    }

    public function titleDateBetweenRecord(Request $request){
        if(!$request->novel_id || !$request->start || !$request->end){
            return redirect('/author/orders/');
        }else{
            $userId = Auth::user()->id;
            $start = $request->start;
            $end = $request->end;
            $novelId = $request->novel_id;
            $novel = Book::find($novelId);
            $export = new TitleDateBetweenRecord($userId, $novelId, $start, $end);
            return Excel::download($export, $start.' to '.$end.' Report for '.$novel->title.' of '.Auth::user()->name.'.xlsx');
        }
    }

}
