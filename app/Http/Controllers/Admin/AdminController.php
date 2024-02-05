<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\GemOrder;
use App\Models\Order;
use App\Models\Book;

class AdminController extends Controller
{
    public function index(){
        $authors = User::where('role', 'Author')->get();
        $users = User::where('role', 'User')->whereNotNull('email_verified_at')->get();
        $orders = Order::all();
        $novels = Book::all();
        return view('backend.dashboard', compact('authors', 'users', 'orders', 'novels'));
    }

    public function superAdmins(){
        $perPage = 10;
        $currentPage = request()->get('page', 1);
        $no = ($currentPage - 1) * $perPage + 1;
        $users = User::where('role', 'Super Admin')->latest()->paginate($perPage);
        $all = User::where('role', 'Super Admin')->latest()->get();
        return view('backend.users.superAdmins', compact('users', 'no', 'all'));
    }

    public function authors(){
        $perPage = 10;
        $currentPage = request()->get('page', 1);
        $no = ($currentPage - 1) * $perPage + 1;
        $users = User::where('role', 'Author')->latest()->paginate($perPage);
        $all = User::where('role', 'Author')->latest()->get();

        return view('backend.users.authors', compact('users', 'no', 'all'));
    }

    public function users(){
        $perPage = 10;
        $currentPage = request()->get('page', 1);
        $no = ($currentPage - 1) * $perPage + 1;
        $users = User::where('role', 'User')->whereNotNull('email_verified_at')->latest()->paginate($perPage);
        $all = User::where('role', 'User')->whereNotNull('email_verified_at')->latest()->get();
        return view('backend.users.users', compact('users', 'no', 'all'));
    }

    public function pending(){
        $perPage = 10;
        $currentPage = request()->get('page', 1);
        $no = ($currentPage - 1) * $perPage + 1;
        $users = User::where('role', 'User')->whereNull('email_verified_at')->latest()->paginate($perPage);
        $all = User::where('role', 'User')->whereNull('email_verified_at')->latest()->get();
        return view('backend.users.pending', compact('users', 'no', 'all'));
    }

    public function adminSearch(Request $request){
        if(!$request->email){
            return redirect('/admin/superAdmins');
        }else{
            $perPage = 10;
            $currentPage = request()->get('page', 1);
            $no = ($currentPage - 1) * $perPage + 1;
            $email = $request->email;
            $users = User::where('role', 'Super Admin')->where('email', 'like', '%'.$email.'%')->latest()->get();
            $all = User::where('role', 'Super Admin')->where('email', 'like', '%'.$email.'%')->latest()->get();
            return view('backend.users.filter.superAdmins', compact('users', 'no', 'all', 'email'));
        }
    }

    public function adminSearchByDate(Request $request){
        if(!$request->start || !$request->end){
            return redirect('/admin/superAdmins');
        }else{
            $perPage = 10;
            $currentPage = request()->get('page', 1);
            $no = ($currentPage - 1) * $perPage + 1;

            $start = $request->start;
            $end = $request->end;

            $users = User::where('role', 'Super Admin')->whereBetween('created_at', [$start, $end])->latest()->get();
            $all = User::where('role', 'Super Admin')->whereBetween('created_at', [$start, $end])->latest()->get();
            return view('backend.users.filter.superAdmins', compact('users', 'no', 'all', 'start', 'end'));
        }
    }

    public function authorSearch(Request $request){
        if(!$request->email){
            return redirect('/admin/authors');
        }else{
            $perPage = 10;
            $currentPage = request()->get('page', 1);
            $no = ($currentPage - 1) * $perPage + 1;
            $email = $request->email;
            $users = User::where('role', 'Author')->where('email', 'like', '%'.$email.'%')->latest()->get();
            $all = User::where('role', 'Author')->where('email', 'like', '%'.$email.'%')->latest()->get();
            return view('backend.users.filter.authors', compact('users', 'no', 'all', 'email'));
        }
    }

    public function authorSearchByDate(Request $request){
        if(!$request->start || !$request->end){
            return redirect('/admin/authors');
        }else{
            $perPage = 10;
            $currentPage = request()->get('page', 1);
            $no = ($currentPage - 1) * $perPage + 1;

            $start = $request->start;
            $end = $request->end;

            $users = User::where('role', 'Author')->whereBetween('created_at', [$start, $end])->latest()->get();
            $all = User::where('role', 'Author')->whereBetween('created_at', [$start, $end])->latest()->get();
            return view('backend.users.filter.authors', compact('users', 'no', 'all', 'start', 'end'));
        }

    }

    public function userSearch(Request $request){
        if(!$request->email){
            return redirect('/admin/users');
        }else{
            $perPage = 10;
            $currentPage = request()->get('page', 1);
            $no = ($currentPage - 1) * $perPage + 1;
            $email = $request->email;
            $users = User::where('role', 'User')->whereNotNull('email_verified_at')->where('email', 'like', '%'.$email.'%')->latest()->get();
            $all = User::where('role', 'User')->whereNotNull('email_verified_at')->where('email', 'like', '%'.$email.'%')->latest()->get();
            return view('backend.users.filter.users', compact('users', 'no', 'all', 'email'));
        }
    }

    public function userSearchByDate(Request $request){
        if(!$request->start || !$request->end){
            return redirect('/admin/users');
        }else{
            $perPage = 10;
            $currentPage = request()->get('page', 1);
            $no = ($currentPage - 1) * $perPage + 1;

            $start = $request->start;
            $end = $request->end;

            $users = User::where('role', 'User')->whereNotNull('email_verified_at')->whereBetween('created_at', [$start, $end])->latest()->get();
            $all = User::where('role', 'User')->whereNotNull('email_verified_at')->whereBetween('created_at', [$start, $end])->latest()->get();
            return view('backend.users.filter.users', compact('users', 'no', 'all', 'start', 'end'));
        }

    }

    public function pendingSearch(Request $request){
        if(!$request->email){
            return redirect('/admin/pending-list');
        }else{
            $perPage = 10;
            $currentPage = request()->get('page', 1);
            $no = ($currentPage - 1) * $perPage + 1;
            $email = $request->email;
            $users = User::where('role', 'User')->whereNull('email_verified_at')->where('email', 'like', '%'.$email.'%')->latest()->get();
            $all = User::where('role', 'User')->whereNull('email_verified_at')->where('email', 'like', '%'.$email.'%')->latest()->get();
            return view('backend.users.filter.pending', compact('users', 'no', 'all', 'email'));
        }
    }

    public function pendingSearchByDate(Request $request){
        if(!$request->start || !$request->end){
            return redirect('/admin/pending-list');
        }else{
            $perPage = 10;
            $currentPage = request()->get('page', 1);
            $no = ($currentPage - 1) * $perPage + 1;

            $start = $request->start;
            $end = $request->end;

            $users = User::where('role', 'User')->whereNull('email_verified_at')->whereBetween('created_at', [$start, $end])->latest()->get();
            $all = User::where('role', 'User')->whereNull('email_verified_at')->whereBetween('created_at', [$start, $end])->latest()->get();
            return view('backend.users.filter.pending', compact('users', 'no', 'all', 'start', 'end'));
        }
    }

    public function roleChange(Request $request, $id){
        User::find($id)->update([
            'role' => $request->role
        ]);
        if($request->role == "Super Admin"){
            return redirect('/admin/superAdmins/')->with('success', 'Admin Role has been changed.');
        }elseif($request->role == "Author"){
            return redirect('/admin/authors/')->with('success', 'Author Role has been changed.');
        }elseif($request->role == "User"){
            return redirect('/admin/users/')->with('success', 'User Role has been changed.');
        }

    }

    public function percentChange(Request $request, $id){
        $user = User::find($id);
        if(!$user){
            return redirect()->back()->with('error', "Data Not Found!");
        }else{
            $user->update([
                'percent' => $request->percent
            ]);
            return redirect()->back()->with('success', "Author Percentage has been setup.");
        }
    }

    public function gem(Request $request, $id){
        $gem = User::find($id);
        $request->validate([
            'gem' => 'required'
        ]);
        $gem->update([
            'gem' => $gem->gem + $request->gem
        ]);
        GemOrder::create([
            'user_id' => $id,
            'gem_amount' => $request->gem,
            'created_by' => $request->created_by
        ]);
        return redirect()->back()->with('success', 'Filled '.$request->gem.' Gems Successfully.');
    }

    public function userDelete(Request $request){
        $id = $request->id;
        User::destroy($id);
        return redirect()->back()->with('success', 'User Removed');
    }

    public function gem_order(){
        $perPage = 10;
        $currentPage = request()->get('page', 1);
        $no = ($currentPage - 1) * $perPage + 1;

        $query = GemOrder::join('users', 'gem_orders.created_by', '=', 'users.id')
              ->select('gem_orders.*', 'users.name');
        $all = $query->latest()->get();
        $gem_orders = $query->latest()->paginate($perPage);

        return view('backend.gems.gem', compact('gem_orders', 'no', 'all'));
    }

    public function gemOrderDateBetween(Request $request){
        if(!$request->start || !$request->end){
            return redirect('/admin/gem_order/');
        }else{
            $start = $request->start;
            $end = $request->end;

            $perPage = 10;
            $currentPage = request()->get('page', 1);
            $no = ($currentPage - 1) * $perPage + 1;

            $query = GemOrder::join('users', 'gem_orders.created_by', '=', 'users.id')
                  ->select('gem_orders.*', 'users.name');
            $all = $query->whereBetween('gem_orders.created_at', [$start, $end])->latest()->get();
            $gem_orders = $query->whereBetween('gem_orders.created_at', [$start, $end])->latest()->get();

            return view('backend.gems.search', compact('gem_orders', 'no', 'all', 'start', 'end'));
        }
    }


}
