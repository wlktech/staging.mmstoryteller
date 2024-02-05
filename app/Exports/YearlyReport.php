<?php

namespace App\Exports;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use App\Models\Order;
use App\Models\User;

class YearlyReport implements FromView
{
    protected $year;

    public function __construct($year = null)
    {
        $this->year = $year;
    }

    public function view(): View
    {
        $orders = Order::with('chapter.user')
            ->whereYear('created_at', '=', $this->year)
            ->latest()
            ->cursor();

        $year = $this->year;


        return view('backend.exports.yearlyReport', compact('orders','year'));
    }
}
