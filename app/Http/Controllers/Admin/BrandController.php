<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\brand;
use Carbon\carbon;

class BrandController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index(){
        $brands=brand::latest()->get();
        return view('admin.brand.index',compact('brands'));
    }
    public function store(Request $request){
        $request->validate([
            'brand_name' => 'required|unique:brands,brand_name'
        ]);

        brand::insert([
            'brand_name'=>$request->brand_name,
            'created_at'=>Carbon::now()
        ]);
        return Redirect()->back()->with('success','Brand added');
       
    }


    public function Edit($cat_id){
        $brand=brand::find($cat_id);
        return view('admin.brand.edit',compact('brand'));
        }
            public function update(Request $request){
                $cat_id=$request->id;
                brand::find( $cat_id)->update([
                'brand_name'=>$request->brand_name,
                'updated_at'=>Carbon::now()
            ]);
            return Redirect()->route('admin.brand')->with('catupdated','Brand updated');
        }

        public function Delete($cat_id){
            brand::find($cat_id)->delete();
            return Redirect()->back()->with('delete','Brand successfully deleted');
        }

        public function inactive($cat_id){
            brand::find($cat_id)->update(['status'=>0]);
            return Redirect()->back()->with('status','Status successfully updated');
        }
        public function active($cat_id){
            brand::find($cat_id)->update(['status'=>1]);
            return Redirect()->back()->with('status','Status successfully updated');
        }
}
