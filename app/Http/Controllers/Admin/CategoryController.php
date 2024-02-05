<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function index(){
        $perPage = 10;
        $currentPage = request()->get('page', 1);
        $no = ($currentPage - 1) * $perPage + 1;

        $all = Category::latest()->get();
        $categories = Category::latest()->paginate($perPage);
        return view('backend.categories.index', compact('categories', 'no', 'all'));
    }

    public function searchByName(Request $request){
        if(!$request->name){
            return redirect('/admin/category/');
        }else{
            $perPage = 10;
            $currentPage = request()->get('page', 1);
            $no = ($currentPage - 1) * $perPage + 1;

            $name = $request->name;

            $all = Category::where('name', 'like', '%'.$name.'%')->latest()->get();
            $categories = Category::where('name', 'like', '%'.$name.'%')->latest()->paginate($perPage);
            return view('backend.categories.index', compact('categories', 'no', 'all', 'name'));
        }
    }

    public function searchByDate(Request $request){
        if(!$request->start || !$request->end){
            return redirect('/admin/category/');
        }else{
            $perPage = 10;
            $currentPage = request()->get('page', 1);
            $no = ($currentPage - 1) * $perPage + 1;

            $start = $request->start;
            $end = $request->end;

            $all = Category::whereBetween('created_at', [$start, $end])->latest()->get();
            $categories = Category::whereBetween('created_at', [$start, $end])->latest()->paginate($perPage);
            return view('backend.categories.index', compact('categories', 'no', 'all', 'start', 'end'));
        }
    }

    public function create(Request $request){
        if(!$request->name){
            return redirect()->back()->with('error', "Please Fill Category Name First!");
        }
        Category::create([
            'name'=>$request->name,
        ]);
        return redirect()->back()->with('success', 'New Category Created');
    }

    public function edit(Request $request){
        $id = $request->id;
        Category::find($id)->update([
            'name' => $request->name,
        ]);
        return redirect()->back()->with('success', 'Category Edited');
    }

    public function delete(Request $request){
        $id = $request->id;
        Category::destroy($id);
        return redirect()->back()->with('success', 'Category Removed');
    }
}
