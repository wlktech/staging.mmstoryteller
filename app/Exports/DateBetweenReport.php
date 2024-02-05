<?php

namespace App\Exports;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use App\Models\Order;

class DateBetweenReport implements FromView
{
    protected $start;
    protected $end;

    public function __construct($start = null, $end = null)
    {
        $this->start = $start;
        $this->end = $end;
    }

    public function view(): View
    {
        $orders = Order::whereBetween('created_at', [$this->start, $this->end])
            ->latest()
            ->cursor();

        $start = $this->start;
        $end = $this->end;


        return view('backend.exports.dateBetweenReport', compact('orders','start', 'end'));
    }
}
