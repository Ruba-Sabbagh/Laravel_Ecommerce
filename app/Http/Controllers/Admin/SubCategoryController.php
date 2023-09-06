<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SubCategoryController extends Controller
{
    public function Index(){
        return view('admin.allsubcategory');
    }
    public function AddSubCategory(){
        $request->validate([
            'name' => 'required|unique:sub_category',// category table name
        ]);
        Category::insert([
            'name' => $request->name, // input name
            'slug' => strtolower(str_replace(' ','-',$request->name)),
        ]);
        return redirect()->route('allsubcategory')->with('message','Sub Category Added Successfully') ;
    }
}
