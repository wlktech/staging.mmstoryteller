<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\HomeBanner;
use App\Models\Book;
use App\Models\Chapter;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use App\Models\User;
use App\Models\Order;
use App\Models\Event;
use App\Models\Category;
use App\Models\Review;
use App\Models\Bookmark;
use App\Mail\SendMail;


class HomeController extends Controller
{
    //home page
    public function index(){
        if(Auth::check()){
            if(Auth::user()->email_verified_at == null){
                return redirect()->back()->with('error', "Please Email Verified First!");
            }
        }
        //home banners
        $banners = HomeBanner::all();
        //home banners

        // popular series
        //desktop view
        $popularBooks = Book::has('chapter')->withCount('order')
            ->orderBy('order_count', 'desc')
            ->orwhere('popular', '1')->take(20)
            ->get();
            // return $popularBooks;
        //desktop view
        //mobile view
        $popularMobile = Book::has('chapter')->withCount('order')
            ->orderBy('order_count', 'desc')
            ->orwhere('popular', '1')->take(9)
            ->get();
        //mobile view
        // popular series

        //new series //logic is latest created book or new-switch = 1
        //desktop
        $newBooks = Book::has('chapter')
        ->latest('created_at')
        ->orwhere('new', '1')->take(20)
        ->get();

        //mobile
        $newMobile = Book::has('chapter')
        ->latest('created_at')
        ->orwhere('new', '1')->take(9)
        ->get();
        //new series

        //fanfic
        //desktop
        $fanBooks = Book::has('chapter')->whereHas('category', function($query){
            $query->where('name', 'Fanfic');
        })
        ->latest('created_at')->take(20)
        ->get();
        //mobile
        $fanMobile = Book::has('chapter')->whereHas('category', function($query){
            $query->where('name', 'Fanfic');
        })
        ->latest('created_at')->take(9)
        ->get();
        // return $fanBooks;

        // latest releases
        $latestChapters = Chapter::latest()->get();
        //desktop
        $latestBooks = Book::whereIn('id', $latestChapters->pluck('book_id'))
        ->has('chapter')
        ->distinct()->take(20)
        ->latest()
        ->get();
        //mobile
        $latestMobile = Book::whereIn('id', $latestChapters->pluck('book_id'))
        ->has('chapter')
        ->distinct()->take(9)
        ->latest()
        ->get();
        // latest releases

        // return $latestBooks;

        return view('frontend.home', compact('banners', 'popularBooks', 'popularMobile', 'latestBooks','latestMobile', 'newBooks','newMobile', 'fanBooks', 'fanMobile'));
    }
    //home page

    //event page
    public function event(){
        $events = Event::latest()->get();
        return view('frontend.event', compact('events'));
    }
    public function eventDetail($id){
        $event = Event::find($id);
        $subString = Str::substr($event->description, 0, 2000);
        $events = Event::whereNotIn('id', [$id])->take(3)->get();
        return view('frontend.event-detail', compact('event', 'events', 'subString'));
    }
    //event page

    //About Page
    public function about(){
        return view('frontend.about');
    }
    //About Page

    //gem Page
    public function gem(){
        return view('frontend.gem');
    }
    //gem Page

    //book page
    public function book($id){
        $book = Book::withCount('chapter')->where('id', $id)->first();
        if(!$book){
            return redirect()->back()->with('error', "Book Not Found!");
        }
        $first = $book->chapter[0];
        $last = ($book->chapter->count() - 1);

        //LIFO
        $desktopChapters = Chapter::where('book_id', $id)->latest('created_at')->limit(50)->get();
        $mobileChapters = Chapter::where('book_id', $id)->latest('created_at')->limit(20)->get();
        $all = Chapter::where('book_id', $id)->latest('created_at')->get();
        //LIFO

        //FIFO
        $desktopAsc = Chapter::where('book_id', $id)->limit(50)->get();
        $mobileAsc = Chapter::where('book_id', $id)->limit(20)->get();
        $allAsc = Chapter::where('book_id', $id)->get();
        //FIFO

        $orders = Order::where('book_id', $id)->get();
        $relatedBooks = Book::has('chapter')->where('category_id', $book->category_id)->whereNotIn('id', [$book->id])
        ->inRandomOrder()
        ->limit(4)
        ->get();

        $mobileBooks = Book::has('chapter')->where('category_id', $book->category_id)->whereNotIn('id', [$book->id])
        ->inRandomOrder()
        ->limit(3)
        ->get();

        $reviews = Review::where('book_id', $book->id)->latest('created_at')->get();
        // return $unorderChapters;
        if(Auth::check()){
            $bookmark = Bookmark::where('user_id', Auth::user()->id)->where('book_id', $book->id)->first();
            //ordered chapters
            $userID = Auth::user()->id;
            $orderedNovels = Chapter::has('order')->with(['order' => function ($query) use ($userID) {
                $query->where('user_id', $userID);
            }])
            ->where('book_id', $id)
            ->get();
            //ordered chapters
            //unordered chapters
            $unorderChapters = Chapter::where('book_id', $id)
            ->whereDoesntHave('order', function ($query) use ($userID) {
                $query->where('user_id', $userID);
            })
            ->where('status', '!=', 'Free') // Only chapters not in "Free" status
            ->get();
            // return $unorderChapters->sum('status');
            //unordered chapters
            return view('frontend.novelDesc', compact('book', 'orders', 'relatedBooks', 'mobileBooks', 'desktopChapters', 'mobileChapters', 'all', 'desktopAsc', 'mobileAsc', 'allAsc', 'reviews', 'bookmark', 'unorderChapters'));
        }else{
            return view('frontend.novelDesc', compact('book', 'orders', 'relatedBooks', 'mobileBooks', 'desktopChapters', 'mobileChapters', 'all', 'desktopAsc', 'mobileAsc', 'allAsc', 'reviews'));
        }
    }
    //book page

    //each chapter page
    public function chapter($id){
        $chapter = Chapter::find($id);
        if(!$chapter){
            return redirect()->back()->with('error', "Chapter Not Found!");
        }
        $book = Book::withCount('chapter')->where('id', $chapter->book_id)->first();
        $first = $book->chapter[0];
        $final = ($book->chapter->count() - 1);
        $last = $book->chapter[$final];

        $totalArray = $book->chapter->count() - 1;

        $chapter->increment('view_count');
        return view('frontend.chapter', compact('chapter', 'book', 'first', 'last', 'totalArray'));
    }

    public function payment(Request $request)
    {
        if (!is_numeric($request->status)) {
            return response()->json([
                'success' => false,
                'data' => "Please do not enter any extra in the input box"
            ]);
        }

        $userId = Auth::user()->id;
        $user = User::find($userId);
        $chapter = Chapter::findOrFail($request->chapter_id);

        $order = Order::where('user_id', $userId)->where('chapter_id', $request->chapter_id)->first();

        if ($order) {
            return response()->json([
                'success' => false,
                'data' => "You have already ordered."
            ]);
        }

        if ($user->gem < $request->status) {
            return response()->json([
                'success' => false,
                'data' => "You have not enough gems!"
            ]);
        }

        if ($request->status !== $chapter->status) {
            return response()->json([
                'success' => false,
                'data' => "Please make the right balance!"
            ]);
        }

        $cost = $request->status * 10;
        $author_percent = $chapter->user->percent / 100;
        $admin_percent = (100 - $chapter->user->percent) / 100;

        $currentOrder = Order::create([
            'book_id' => $request->book_id,
            'chapter_id' => $request->chapter_id,
            'user_id' => $userId,
            'gem' => $request->status,
            'cost' => $cost,
            'author_percent' => $cost * $author_percent,
            'admin_percent' => $cost * $admin_percent,
            'remark' => "(" . $chapter->user->percent . "%) for Author and (" . (100 - $chapter->user->percent) . "%) for Admin"
        ]);

        $user->update([
            'gem' => $user->gem - $request->status
        ]);

        return response()->json([
            'success' => true,
            'data' => $currentOrder
        ]);
    }

    // public function payment(Request $request){
    //     if (!is_numeric($request->status)) {
    //         return redirect()->back()->with('error', 'Please do not enter any extra in the input box');
    //     }

    //     $userId = Auth::user()->id;
    //     $user = User::where('id', $userId)->first();
    //     $chapter = Chapter::where('id', $request->chapter_id)->first();
    //     $cost = $request->status*10;
    //     $author_percent = $chapter->user->percent/100;
    //     $admin_percent = (100 - $chapter->user->percent)/100;

    //     $order = Order::where('user_id', $userId)->where('chapter_id', $request->chapter_id)->first();
    //     if($order){
    //         return redirect()->back()->with('error', "You have already ordered.");
    //     }else{
    //         if($user->gem < $request->status){
    //             return redirect()->back()->with('error', "You have not enough gems!");
    //         }elseif($request->status !== $chapter->status){
    //             return redirect()->back()->with('error', "Please make the right balance!");
    //         }else{
    //             Order::create([
    //                 'book_id' => $request->book_id,
    //                 'chapter_id' => $request->chapter_id,
    //                 'user_id' => $userId,
    //                 'gem' => $request->status,
    //                 'cost' => $cost,
    //                 'author_percent' => $cost * $author_percent,
    //                 'admin_percent' => $cost * $admin_percent,
    //                 'remark' => "(".$chapter->user->percent."%) for Author and (".(100-$chapter->user->percent)."%) for Admin"
    //             ]);
    //             $user->update([
    //                 'gem' => $user->gem - $request->status
    //             ]);
    //             return redirect()->back()->with('success', "Payment has been sent successfully.");
    //         }
    //     }
    // }

    public function paymentByNovel(Request $request){
        $book_id = $request->book_id;
        $total = $request->status;
        $userID = Auth::user()->id;
        $user = User::find($userID);
        $unorderChapters = Chapter::where('book_id', $book_id)
        ->whereDoesntHave('order', function ($query) use ($userID) {
            $query->where('user_id', $userID);
        })
        ->where('status', '!=', 'Free') // Only chapters not in "Free" status
        ->get();

        // return $unorderChapters->sum('status');

        if(Auth::user()->gem < $total){
            return redirect()->back()->with('error', "You have not enough gems!");
        }elseif($total != $unorderChapters->sum('status')){
            return redirect()->back()->with('error', "Please make the right balance!");
        }else{
            foreach($unorderChapters as $chapter){
                Order::create([
                    'book_id' => $book_id,
                    'chapter_id' => $chapter->id,
                    'user_id' => $userID,
                    'gem' => $chapter->status,
                    'cost' => $chapter->status*10,
                    'author_percent' => ($chapter->status*10) * ($chapter->user->percent/100),
                    'admin_percent' => ($chapter->status*10) * ((100 - $chapter->user->percent)/100),
                    'remark' => "(".$chapter->user->percent."%) for Author and (".(100-$chapter->user->percent)."%) for Admin"
                ]);
            }

            $user->update([
                'gem' => $user->gem - $total
            ]);
            return redirect()->back()->with('success', "Payment has been sent successfully.");
        }

    }

    //contact start
    public function contact(){
        return view('frontend.contact');
    }

    //sendMail
    public function sendMail(Request $request){
        $toMail = "iqteam@mmstoryteller.com";
        $mail = [
            'name' => $request->name,
            'email' => $request->email,
            'message'=> $request->message,
        ];
        // return $message;
        Mail::to($toMail)->send(new SendMail($mail));
        return redirect()->back()->with('success', 'Mail Sent Successfully.');
    }
    //contact end

    //search function
    public function search(Request $request){
        $name = $request->name;
        $searchNovel = Book::where('title', 'like', '%'.$name.'%')->orWhereHas('user', function($query) use ($name) {
            $query->where('name', 'like', '%'.$name.'%');
        })->get();
        return view('frontend.search', compact('name', 'searchNovel'));
    }
}



