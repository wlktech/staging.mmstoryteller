<?php

namespace App\Exports;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use App\Models\Order;

class MonthlyReport implements FromView
{
    protected $month;
    protected $year;

    public function __construct($month = null, $year = null)
    {
        $this->month = $month;
        $this->year = $year;
    }

    public function view(): View
    {
        $orders = Order::with('chapter.user')
            ->whereMonth('created_at', '=', $this->month)
            ->whereYear('created_at', '=', $this->year)
            ->latest()
            ->cursor();

        $month = $this->month;
        $year = $this->year;


        return view('backend.exports.monthlyReport', compact('orders','month', 'year'));
    }
}
