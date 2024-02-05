<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\Chapter;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;

class PaidMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $id = $request->id;
        $chapter = Chapter::find($id);
        if(!$chapter){
            return redirect()->back()->with('error', "Chapter Not Found!");
        }

        if($chapter->status == "Free"){
            return $next($request);
        }

        if (!Auth::check()) {
            return redirect('/')->with('error', "Please Login First!");
        }
        $user = Auth::user();

        $order = Order::where('chapter_id', $id)->where('user_id', $user->id)->first();

        if($order && $order->user_id == $user->id){
            return $next($request);
        }else{
            if (!$order || !$order->chapter_id) {
                return redirect()->back()->with('error', "Please make a payment.");
                // return response('Unauthorized. Please make a payment.', 401);
            }
            if (!$chapter || $order->gem !== $chapter->status) {
                return redirect()->back()->with('error', "Please make a payment.");
                    // return response('Unauthorized. Please make a payment.', 401);
            }
        }
        return $next($request);
    }
}
