<?php

namespace App\Exports;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use App\Models\Order;

class OverallExport implements FromView
{
    public function view(): View
    {
        return view('backend.exports.overallOrder', [
            'orders' => Order::with('chapter')->latest()->get()
        ]);
        // return view('backend.exports.overallOrder', [
        //     'orders' => Order::join("books", "orders.book_id", "=", "books.id")
        //                 ->join("chapters", "orders.chapter_id", "=", "chapters.id")
        //                 ->join("users as author", "chapters.user_id", "=", "author.id")
        //                 ->join("users as user", "orders.user_id", "=", "user.id")
        //                 ->select("orders.id", "books.title", "chapters.name as chapter", "author.name as author", "user.name as user", "orders.gem", "orders.created_at")
        //                 ->latest('created_at')->get()
        // ]);
    }
}
