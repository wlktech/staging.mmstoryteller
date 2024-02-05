<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\HomeBanner;
use Illuminate\Support\Facades\File;

class HomeBannerController extends Controller
{
    public function index(){
        $perPage = 10;
        $currentPage = request()->get('page', 1);
        $no = ($currentPage - 1) * $perPage + 1;
        $all = HomeBanner::latest()->get();
        $banners = HomeBanner::latest()->paginate($perPage);
        return view('backend.homebanners.index', compact('banners', 'no', 'all'));
    }

    public function create(Request $request){
        if(!$request->file('image')){
            return redirect()->back()->with('error', "Please Choose Banner Image First!");
        }

        // image
        $image = $request->file('image');
        $ext = $image->getClientOriginalExtension();
        $filename = uniqid('homebanner') . '.' . $ext; // Generate a unique filename
        $image->move(public_path('assets/img/homebanner/'), $filename); // Save the file to the pub

        HomeBanner::create([
            'image' => $filename,
        ]);
        return redirect()->back()->with('success', 'New Banner Image Added.');
    }

    public function edit(Request $request){
        $id = $request->id;
        $banner = HomeBanner::find($id);
        if(!$request->file('image')){
            return redirect()->back()->with('error', 'Please Choose Banner Image First!');
        }else{
            //remove banner from localstorage
            File::delete(public_path('assets/img/homebanner/'.$banner->image));

            // image
            $image = $request->file('image');
            $ext = $image->getClientOriginalExtension();
            $filename = uniqid('homebanner') . '.' . $ext; // Generate a unique filename
            $image->move(public_path('assets/img/homebanner/'), $filename); // Save the file to the pub

            $banner->update([
                'image' => $filename,
            ]);
            return redirect()->back()->with('success', 'Banner Image Updated.');
        }
    }

    public function delete(Request $request){
        $id = $request->id;
        $banner = HomeBanner::find($id);
        //remove banner from localstorage
        File::delete(public_path('assets/img/homebanner/'.$banner->image));
        HomeBanner::destroy($id);
        return redirect()->back()->with('success', "Banner Image Removed.");
    }
}
