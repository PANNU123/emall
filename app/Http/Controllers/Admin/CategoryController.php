<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\category;
use Carbon\carbon;

class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    public function index(){
        $categories=category::latest()->get();
        return view ('admin.category.index',compact('categories'));
    }

    //==========store=======
    public function store(Request $request){
        $request->validate([
            'category_name' => 'required|unique:categories,category_name'
        ]);

        category::insert([
            'category_name'=>$request->category_name,
            'created_at'=>Carbon::now()
        ]);
        return Redirect()->back()->with('success','Category added');
    }
    //==========edit=====
    public function Edit($cat_id){
        $category=category::find($cat_id);
        return view('admin.category.edit',compact('category'));
    }

    //======update===
    public function update(Request $request){
        $cat_id=$request->id;
        category::find( $cat_id)->update([
            'category_name'=>$request->category_name,
            'updated_at'=>Carbon::now()
        ]);
        return Redirect()->route('admin.category')->with('catupdated','Category updated');
    }
    //=======delete======
    public function delete($cat_id){
        category::find( $cat_id)->delete();
        return Redirect()->back()->with('delete','Category successfully deleted');
    }
    //======status

    public function active($cat_id){
        category::find( $cat_id)->update(['status'=>1]);
        return Redirect()->back()->with('status','Status successfully updated');
    }


    public function inactive($cat_id){
        category::find($cat_id)->update(['status'=>0]);
        return Redirect()->back()->with('status','status successfully update');
    }

}
