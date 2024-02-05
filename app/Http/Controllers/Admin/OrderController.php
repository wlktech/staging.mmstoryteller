<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\User;
use App\Models\Book;
use App\Exports\OverallExport;
use App\Exports\AuthorMonthlyReport;
use App\Exports\AuthorYearlyReport;
use App\Exports\DateBetweenReport;
use App\Exports\AuthorDateBetweenReport;
use App\Exports\AuthorTitleDateBetween;
use App\Exports\MonthlyReport;
use App\Exports\YearlyReport;
use App\Models\Chapter;
use Maatwebsite\Excel\Facades\Excel;

class OrderController extends Controller
{
    public function index(){
        $perPage = 10;
        $currentPage = request()->get('page', 1);
        $no = ($currentPage - 1) * $perPage + 1;

        $orders = Order::with('chapter')->latest()->paginate($perPage);
        $totalOrders = Order::all();

        $users = User::where('role', 'Author')->orWhere('role', 'Super Admin')->get();
        $years = Order::selectRaw('YEAR(created_at) as year')->distinct()->get();
        $novels = Book::latest()->get();

        return view("backend.orders.index", compact('orders', 'no', 'totalOrders', 'users', 'years', 'novels'));
    }

    // public function filterByAuthor($id)
    // {
    //     $perPage = 10;
    //     $currentPage = request()->get('page', 1);
    //     $no = ($currentPage - 1) * $perPage + 1;

    //     $ordersQuery = Order::with('chapter')->whereHas('chapter', function ($query) use ($id) {
    //         $query->where('user_id', $id);
    //     })->latest();

    //     $totalOrders = clone $ordersQuery->get();

    //     $orders = $ordersQuery->get();

    //     $users = User::where('role', 'Author')->orWhere('role', 'Super Admin')->get();
    //     $user = User::find($id);
    //     $years = Order::selectRaw('YEAR(created_at) as year')->distinct()->get();

    //     return view("backend.orders.search", compact('orders', 'no', 'totalOrders', 'users', 'user', 'years'));
    // }

    public function dateBetween(Request $request)
    {
        if(!$request->start || !$request->end){
            return redirect('/admin/orders');
        }else{
            $start = $request->start;
            $end = $request->end;

            $perPage = 10;
            $currentPage = request()->get('page', 1);
            $no = ($currentPage - 1) * $perPage + 1;

            $query = Order::with('chapter');

            $multiSearch = $query->whereBetween('created_at', [$start, $end])->latest();

            $totalOrders = clone $multiSearch->get();

            $orders = $multiSearch->get();

            $users = User::where('role', 'Author')->orWhere('role', 'Super Admin')->get();
            $years = Order::selectRaw('YEAR(created_at) as year')->distinct()->get();
            $novels = Book::latest()->get();

            return view("backend.orders.search", compact('orders', 'no', 'totalOrders', 'users', 'years', 'start', 'end', 'novels'));
        }

    }

    public function authorDateBetween(Request $request)
    {
        if(!$request->user_id || !$request->start || !$request->end){
            return redirect('/admin/orders');
        }else{
            $id = $request->user_id;
            $start = $request->start;
            $end = $request->end;
            // return $request->all();

            $perPage = 10;
            $currentPage = request()->get('page', 1);
            $no = ($currentPage - 1) * $perPage + 1;

            $searchAuthor = Order::with('chapter')->whereHas('chapter', function ($query) use ($id) {
                $query->where('user_id', $id);
            })->latest();

            $multiSearch = $searchAuthor->whereBetween('created_at', [$start, $end])->latest();

            $totalOrders = clone $multiSearch->get();

            $orders = $multiSearch->get();

            $users = User::where('role', 'Author')->orWhere('role', 'Super Admin')->get();
            $user = User::find($request->user_id);
            $years = Order::selectRaw('YEAR(created_at) as year')->distinct()->get();
            $novels = Book::latest()->get();

            return view("backend.orders.search", compact('orders', 'no', 'totalOrders', 'users', 'user', 'years', 'start', 'end', 'novels'));
        }

    }

    public function titleDateBetween(Request $request){
        if(!$request->user_id || !$request->novel_id || !$request->start || !$request->end){
            return redirect('/admin/orders');
        }else{
            $id = $request->user_id;
            $novel_id = $request->novel_id;
            $start = $request->start;
            $end = $request->end;

            $perPage = 10;
            $currentPage = request()->get('page', 1);
            $no = ($currentPage - 1) * $perPage + 1;

            $searchAuthor = Order::with('chapter')->whereHas('chapter', function ($query) use ($id) {
                $query->where('user_id', $id);
            });

            $novelTitle = $searchAuthor->where('book_id', $novel_id);
            $multiSearch = $novelTitle->whereBetween('created_at', [$start, $end])->latest();
            $totalOrders = clone $multiSearch->get();

            $orders = $multiSearch->get();

            $users = User::where('role', 'Author')->orWhere('role', 'Super Admin')->get();
            $user = User::find($request->user_id);
            $years = Order::selectRaw('YEAR(created_at) as year')->distinct()->get();
            $novels = Book::latest()->get();
            $novel = Book::find($request->novel_id);

            return view("backend.orders.search", compact('orders', 'no', 'totalOrders', 'users', 'user', 'years', 'start', 'end', 'novel_id', 'novels', 'novel'));
        }
    }

    // public function monthlySearch(Request $request)
    // {
    //     $month = $request->month;
    //     $year = $request->year;

    //     $perPage = 10;
    //     $currentPage = request()->get('page', 1);
    //     $no = ($currentPage - 1) * $perPage + 1;

    //     $ordersQuery = Order::whereMonth('created_at', '=', $month)->whereYear('created_at', '=', $year)
    //                 ->latest();

    //     $totalOrders = clone $ordersQuery->get();

    //     $orders = $ordersQuery->get();

    //     $users = User::where('role', 'Author')->orWhere('role', 'Super Admin')->get();
    //     $years = Order::selectRaw('YEAR(created_at) as year')->distinct()->get();

    //     // return $orders;
    //     return view("backend.orders.search", compact('orders', 'no', 'totalOrders', 'users', 'month', 'years', 'year'));
    // }

    // public function yearlySearch(Request $request)
    // {
    //     $year = $request->year;

    //     $perPage = 10;
    //     $currentPage = request()->get('page', 1);
    //     $no = ($currentPage - 1) * $perPage + 1;

    //     $ordersQuery = Order::whereYear('created_at', '=', $year)
    //                 ->latest();

    //     $totalOrders = clone $ordersQuery->get();

    //     $orders = $ordersQuery->get();

    //     $users = User::where('role', 'Author')->orWhere('role', 'Super Admin')->get();
    //     $years = Order::selectRaw('YEAR(created_at) as year')->distinct()->get();

    //     // return $orders;
    //     return view("backend.orders.search", compact('orders', 'no', 'totalOrders', 'users', 'years', 'year'));
    // }



    // public function authorMonthly(Request $request)
    // {
    //     $id = $request->user_id;
    //     $month = $request->month;
    //     $year = $request->year;
    //     // return $request->all();

    //     $perPage = 10;
    //     $currentPage = request()->get('page', 1);
    //     $no = ($currentPage - 1) * $perPage + 1;

    //     $searchAuthor = Order::with('chapter')->whereHas('chapter', function ($query) use ($id) {
    //         $query->where('user_id', $id);
    //     })->latest();

    //     $multiSearch = $searchAuthor->whereMonth('created_at', '=', $month)->whereYear('created_at', '=', $year)->latest();

    //     $totalOrders = clone $multiSearch->get();

    //     $orders = $multiSearch->get();

    //     $users = User::where('role', 'Author')->orWhere('role', 'Super Admin')->get();
    //     $user = User::find($request->user_id);
    //     $years = Order::selectRaw('YEAR(created_at) as year')->distinct()->get();
    //     // return $orders;
    //     return view("backend.orders.search", compact('orders', 'no', 'totalOrders', 'users', 'month', 'user', 'years', 'year'));
    // }

    // public function authorYearly(Request $request)
    // {
    //     $id = $request->user_id;
    //     $year = $request->year;
    //     // return $request->all();

    //     $perPage = 10;
    //     $currentPage = request()->get('page', 1);
    //     $no = ($currentPage - 1) * $perPage + 1;

    //     $searchAuthor = Order::with('chapter')->whereHas('chapter', function ($query) use ($id) {
    //         $query->where('user_id', $id);
    //     })->latest();

    //     $multiSearch = $searchAuthor->whereYear('created_at', '=', $year)->latest();

    //     $totalOrders = clone $multiSearch->get();

    //     $orders = $multiSearch->get();

    //     $users = User::where('role', 'Author')->orWhere('role', 'Super Admin')->get();
    //     $user = User::find($request->user_id);
    //     $years = Order::selectRaw('YEAR(created_at) as year')->distinct()->get();
    //     // return $orders;
    //     return view("backend.orders.search", compact('orders', 'no', 'totalOrders', 'users', 'user', 'years', 'year'));
    // }

    // public function overallExport()
    // {
    //     return Excel::download(new OverallExport, 'overall_orders.xlsx');
    // }



    // public function authorMonthlyReport(Request $request){
    //     $request->validate([
    //         'user_id' => 'required',
    //         'month' => 'required',
    //         'year' => 'required',
    //     ]);

    //     if ($request->month == 1) {
    //         $monthName = "Jan";
    //     } elseif ($request->month == 2) {
    //         $monthName = "Feb";
    //     } elseif ($request->month == 3) {
    //         $monthName = "Mar";
    //     } elseif ($request->month == 4) {
    //         $monthName = "Apr";
    //     } elseif ($request->month == 5) {
    //         $monthName = "May";
    //     } elseif ($request->month == 6) {
    //         $monthName = "Jun";
    //     } elseif ($request->month == 7) {
    //         $monthName = "Jul";
    //     } elseif ($request->month == 8) {
    //         $monthName = "Aug";
    //     } elseif ($request->month == 9) {
    //         $monthName = "Sep";
    //     } elseif ($request->month == 10) {
    //         $monthName = "Oct";
    //     } elseif ($request->month == 11) {
    //         $monthName = "Nov";
    //     } elseif ($request->month == 12) {
    //         $monthName = "Dec";
    //     } else {
    //         // Invalid month number
    //         $monthName = "Invalid";
    //     }
    //     $user = User::find($request->user_id);
    //     $userId = $request->user_id;
    //     $month = $request->month;
    //     $year = $request->year;
    //     $export = new AuthorMonthlyReport($userId, $month, $year);
    //     return Excel::download($export, $monthName.'-'.$year.' Report for '.$user->name.'.xlsx');
    // }

    // public function authorYearlyReport(Request $request){
    //     $request->validate([
    //         'user_id' => 'required',
    //         'year' => 'required',
    //     ]);
    //     $user = User::find($request->user_id);
    //     $userId = $request->user_id;
    //     $year = $request->year;
    //     $export = new AuthorYearlyReport($userId, $year);
    //     return Excel::download($export, $year.' Yearly Report for '.$user->name.'.xlsx');
    // }

    public function dateBetweenReport(Request $request){
        $request->validate([
            'start' => 'required',
            'end' => 'required',
        ]);
        $start = $request->start;
        $end = $request->end;
        $export = new DateBetweenReport($start, $end);
        return Excel::download($export, $start.' to '.$end.' Report for MM Storyteller.xlsx');
    }

    public function authorDateBetweenReport(Request $request){
        $request->validate([
            'user_id' => 'required',
            'start' => 'required',
            'end' => 'required',
        ]);

        $userId = $request->user_id;
        $user = User::find($userId);
        $start = $request->start;
        $end = $request->end;
        $export = new AuthorDateBetweenReport($userId, $start, $end);
        return Excel::download($export, $start.' to '.$end.' Report for '.$user->name.'.xlsx');
    }

    public function authorTitleDateBetweenReport(Request $request){
        $request->validate([
            'user_id' => 'required',
            'novel_id' => 'required',
            'start' => 'required',
            'end' => 'required',
        ]);

        $userId = $request->user_id;
        $novelId = $request->novel_id;
        $start = $request->start;
        $end = $request->end;

        $user = User::find($userId);
        $novel = Book::find($novelId);
        $export = new AuthorTitleDateBetween($userId, $novelId, $start, $end);
        return Excel::download($export, $start.' to '.$end.' Report for Titile - '.$novel->title.' of '.$user->name.'.xlsx');
    }

    // public function monthlyReport(Request $request){
    //     $request->validate([
    //         'month' => 'required',
    //         'year' => 'required',
    //     ]);
    //     if ($request->month == 1) {
    //         $monthName = "Jan";
    //     } elseif ($request->month == 2) {
    //         $monthName = "Feb";
    //     } elseif ($request->month == 3) {
    //         $monthName = "Mar";
    //     } elseif ($request->month == 4) {
    //         $monthName = "Apr";
    //     } elseif ($request->month == 5) {
    //         $monthName = "May";
    //     } elseif ($request->month == 6) {
    //         $monthName = "Jun";
    //     } elseif ($request->month == 7) {
    //         $monthName = "Jul";
    //     } elseif ($request->month == 8) {
    //         $monthName = "Aug";
    //     } elseif ($request->month == 9) {
    //         $monthName = "Sep";
    //     } elseif ($request->month == 10) {
    //         $monthName = "Oct";
    //     } elseif ($request->month == 11) {
    //         $monthName = "Nov";
    //     } elseif ($request->month == 12) {
    //         $monthName = "Dec";
    //     } else {
    //         // Invalid month number
    //         $monthName = "Invalid";
    //     }
    //     $month = $request->month;
    //     $year = $request->year;
    //     $export = new MonthlyReport($month, $year);
    //     return Excel::download($export, $monthName.'-'.$year.' Monthly Report form MM Storyteller.xlsx');
    // }

    // public function yearlyReport(Request $request){
    //     $request->validate([
    //         'year' => 'required',
    //     ]);
    //     $year = $request->year;
    //     $export = new YearlyReport($year);
    //     return Excel::download($export, $year.' Yearly Report for MM Storyteller.xlsx');
    // }

    public function editOrder(){
        $orders = Order::all();
        foreach($orders as $order){
            $author_percent = $order->chapter->user->percent / 100;
            $admin_percent = (100 - $order->chapter->user->percent) / 100;
            $order->update([
                'author_percent' => $order->cost * $author_percent,
                'admin_percent' => $order->cost * $admin_percent,
            ]);
        }
        return "OK";
    }
}
