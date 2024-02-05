<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Book;
use App\Models\Order;
use App\Models\Bookmark;
use App\Models\GemOrder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class ProfileController extends Controller
{
    public function profile(){
        $userId = Auth::user()->id;
        $purchase = Book::whereHas('order', function ($query) use ($userId) {
            $query->where('user_id', $userId);
        })->get();
        $bookmarks = Book::whereHas('bookmark', function ($query) use ($userId) {
            $query->where('user_id', $userId);
        })->get();
        $gem_orders = GemOrder::where('user_id', Auth::user()->id)->latest('created_at')->get();
        $orders = Order::where('user_id', Auth::user()->id)->latest('created_at')->get();

        return view('frontend.profile', compact('purchase', 'bookmarks', 'gem_orders', 'orders'));
    }

    public function profileChange(Request $request, $email){
        $request->validate([
            'profile' => 'required|file|mimes:jpeg,png,jpg|max:100',
        ]);
        if(Auth::user()->email === $email){
            $profile = $request->file('profile');
            $ext = $profile->getClientOriginalExtension();
            if($ext === "png" || $ext === "jpeg" || $ext === "jpg"){
                $user = User::where('email', $email)->first();
                //delete existed profile
                File::delete(public_path('assets/img/profile/'.$user->profile));
                // image
                $filename = uniqid('profile') . '.' . $ext; // Generate a unique filename
                $profile->move(public_path('assets/img/profile/'), $filename); // Save the file to the pub

                $user->update([
                    'profile' => $filename
                ]);
                return redirect()->back()->with('success', "Profile Updated.");
            }else{
                return redirect()->back()->with('error', "Please use validate file type!");
            }
        }else{
            return redirect()->back()->with('error', 'Unauthorized Access!');
        }
    }

    public function infoChange(Request $request, $email){
        $request->validate([
            'name' => 'required',
        ]);
        if(Auth::user()->email === $email){
            $user = User::where('email', $email)->first();
            $user->update([
                'name'=>$request->name,
            ]);
            return redirect()->back()->with('success', "Username Updated.");
        }else{
            return redirect()->back()->with('error', 'Unauthorized Access!');
        }
    }

    //change password by checking old password remember or not
    public function changePassword(Request $request, $email){
        if(!$request->oldpassword){
            return redirect()->back()->with('error', "Old Password must be filled.");
        }
        if(!$request->password){
            return redirect()->back()->with('error', "New Password must be filled.");
        }

        if(Auth::user()->email === $email){
            if(Hash::check($request->oldpassword, Auth::user()->password)){
                $user = User::where('email', $email)->first();
                $user->update([
                    'password'=>Hash::make($request->password),
                ]);
                return redirect()->back()->with('success', 'Password changed successfully.');
            }else{
                return redirect()->back()->with('error', 'Old Password is incorrect!');
            }
        }else{
            return redirect()->back()->with('error', 'Unauthorized Access!');
        }
    }

}
