<?php

namespace App\Exports;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use App\Models\Order;
use App\Models\User;

class AuthorMonthlyReport implements FromView
{
    protected $userId;
    protected $month;
    protected $year;

    public function __construct($userId = null, $month = null, $year = null)
    {
        $this->userId = $userId;
        $this->month = $month;
        $this->year = $year;
    }

    public function view(): View
    {
        $author = User::findOrFail($this->userId);

        $orders = Order::with('chapter.user')
            ->whereHas('chapter', function ($query) {
                $query->where('user_id', $this->userId);
            })
            ->whereYear('created_at', $this->year)
            ->whereMonth('created_at', $this->month)
            ->latest()
            ->cursor(); // Use cursor to fetch orders as a generator

        $month = $this->month;
        $year = $this->year;

        return view('backend.exports.authorMonthlyReport', compact('orders', 'author', 'month', 'year'));
    }
}
