<?php

namespace App\Exports;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use App\Models\Order;
use App\Models\User;

class AuthorDateBetweenReport implements FromView
{
    protected $userId;
    protected $start;
    protected $end;

    public function __construct($userId = null, $start = null, $end = null)
    {
        $this->userId = $userId;
        $this->start = $start;
        $this->end = $end;
    }

    public function view(): View
    {
        $orders = Order::with('chapter.user')
                ->whereHas('chapter', function ($query) {
                    $query->where('user_id', $this->userId);
                })
                ->whereBetween('created_at', [$this->start, $this->end])->latest()
                ->cursor();

        $start = $this->start;
        $end = $this->end;

        $author = User::find($this->userId);

        return view('backend.exports.authorDateBetweenReport', compact('orders', 'start', 'end', 'author'));
    }
}
