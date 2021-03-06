<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
Use App\Category;
Use Carbon\carbon;


class CategoryController extends Controller
{
    function addcategoryview()
    {
    	$categories=Category::all();

    	return view('category/view',compact('categories'));
    }

        function addcategoryinsert(Request $request)
    {

    	$request->validate([

		'category_name'=>'required|unique:categories,category_name'
 
		]);

        if(isset($request->menu_status))
        {
          // print_r($request->all());
             Category::insert([
            'category_name'=>$request->category_name,
            'menu_status'=>true,
            //'created_at'=> Carbon::now('Asia/Dhaka')
            'created_at'=> Carbon::now()

        ]);
        
        }

        else
        {
            Category::insert([
            'category_name'=>$request->category_name,
            'menu_status'=>false,
            //'created_at'=> Carbon::now('Asia/Dhaka')
            'created_at'=> Carbon::now()

       ]);

        }





    	return back()->with('status','Category added Successfully');
    }
}
