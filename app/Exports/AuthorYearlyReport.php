<?php

namespace App\Exports;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use App\Models\Order;
use App\Models\User;

class AuthorYearlyReport implements FromView
{
    protected $userId;
    protected $year;

    public function __construct($userId = null, $year = null)
    {
        $this->userId = $userId;
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
            ->latest()
            ->cursor(); // Use cursor to fetch orders as a generator

        $year = $this->year;

        return view('backend.exports.authorYearlyReport', compact('orders', 'author', 'year'));
    }
}
