<?php

namespace App\Exports\Author;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use App\Models\Order;
use App\Models\User;
use App\Models\Book;

class TitleDateBetweenRecord implements FromView
{
    protected $userId;
    protected $novelId;
    protected $start;
    protected $end;

    public function __construct($userId = null, $novelId = null, $start = null, $end = null)
    {
        $this->userId = $userId;
        $this->novelId = $novelId;
        $this->start = $start;
        $this->end = $end;
    }

    public function view(): View
    {
        $orders = Order::with('chapter.user')
                ->whereHas('chapter', function ($query) {
                    $query->where('user_id', $this->userId);
                })
                ->where('book_id', $this->novelId)
                ->whereBetween('created_at', [$this->start, $this->end])->latest()
                ->cursor();

        $start = $this->start;
        $end = $this->end;

        $author = User::find($this->userId);
        $novel = Book::find($this->novelId);

        return view('backend.exports.author.titleDateBetweenRecord', compact('orders', 'start', 'end', 'author', 'novel'));
    }
}
