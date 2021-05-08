<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\product;
use App\category;
use App\brand;
use Image;
use Carbon\Carbon;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    //======add poroduct
    public function addProduct(){
        $categories=category::latest()->get();
        $brands=brand::latest()->get();
        return view ('admin.product.add',compact('categories','brands'));
    }

    //======store product====
    public function storeProduct(Request $request){
        $request->validate([
            'product_name'=>'required|max:255',
            'product_code'=>'required|max:255',
            'product_price'=>'required|max:255',
            'quantity'=>'required|max:255',
            'category_id'=>'required|max:255',
            'brand_id'=>'required|max:255',
            'sort_description'=>'required',
            'long_description'=>'required',
            'img_one'=>'required| mimes:jpg,jpeg,png,gif',
            'img_two'=>'required| mimes:jpg,jpeg,png,gif',
            'img_three'=>'required| mimes:jpg,jpeg,png,gif',

        ],[
            'category_id.required'=>'select category name',
            'brand_id.required'=>'select brand name',
        ]);

        $img_one=$request->file('img_one');
        $name_gen=hexdec(uniqid()).'.'.$img_one->getClientOriginalExtension();
        Image::make($img_one)->resize(270,270)->save('fontend\img\upload'.$name_gen);
        $img_url='fontend/img/upload/'.$name_gen;

        $img_two=$request->file('img_two');
        $name_gen=hexdec(uniqid()).'.'.$img_two->getClientOriginalExtension();
        Image::make($img_two)->resize(270,270)->save('fontend\img\upload'.$name_gen);
        $img_url2='fontend/img/upload/'.$name_gen;

        $img_three=$request->file('img_three');
        $name_gen=hexdec(uniqid()).'.'.$img_three->getClientOriginalExtension();
        Image::make($img_three)->resize(270,270)->save('fontend\img\upload'.$name_gen);
        $img_url3='fontend/img/upload/'.$name_gen;

        product::insert([
            'category_id'=>$request->category_id,
            'brand_id'=>$request->brand_id,
            'product_name'=>$request->product_name,
            'product_slug'=>strtolower(str_replace(' ','-',$request->product_name)),
            'product_code'=>$request->product_code,
            'product_price'=>$request->product_price,
            'quantity'=>$request->quantity,
            'sort_description'=>$request->sort_description,
            'long_description'=>$request->long_description,
            'img_one'=>$img_url,
            'img_two'=>$img_url2,
            'img_three'=>$img_url3,
            'created_at'=>Carbon::now(),

        ]);
        return Redirect()->back()->with('success',' product added succesfyllu');
    }
}
