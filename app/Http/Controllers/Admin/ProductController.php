<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function Index(){
        return view('admin.allproduct');
    }
    public function AddProduct(){
        $request->validate([
            'name' => 'required|unique:products',// category table name
        ]);
        Category::insert([
            'name' => $request->name, // input name
            'slug' => strtolower(str_replace(' ','-',$request->name)),
        ]);
        return redirect()->route('allproduct')->with('message','Product Added Successfully') ;
    }
}
