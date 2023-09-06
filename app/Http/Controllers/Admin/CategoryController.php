<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use Datatables;

class CategoryController extends Controller
{
    public function Index(){
        if(request()->ajax()){
            return datatables()->of(Category::select('*'))
            ->addColumn('action', function($row){

                   // Update Button
                $updateButton = '<a href="javascript:void(0)" data-toggle="tooltip" onClick="editFunc('.$row->id.')" data-original-title="Edit" class="edit btn btn-success edit">
                Edit
                </a>';

                // Delete Button
                $deleteButton = '<a href="javascript:void(0);" id="delete-compnay" onClick="deleteFunc('.$row->id.')" data-toggle="tooltip" data-original-title="Delete" class="delete btn btn-danger">
                Delete
                </a>';

                 return $updateButton." ".$deleteButton;

            }) 
            ->rawColumns(['action'])
            ->addIndexColumn()
            ->make(true);
        }
        //$categories = Category::latest()->get();
        return view('admin.allcategory');
    }
    public function AddCategory(Request $request){
        
        /*$request->validate([
            'name' => 'required|unique:category',// category table name
        ]);
        Category::insert([
            'name' => $request->name, // input name
            'slug' => strtolower(str_replace(' ','-',$request->name)),
        ]);
        return redirect()->route('allcategory')->with('message','Category Added Successfully') ;*/
        $cId = $request->id;
  
        $category   =   Category::updateOrCreate(
                    [
                     'id' => $cId
                    ],
                    [
                    'name' => $request->name, 
                    ]);    
                          
        return Response()->json($category);
    }
    public function EditCategory(Request $request){
        $where = array('id' => $request->id);
        $category  = Category::where($where)->first();
       
        return Response()->json($category);
        
    }
    public function DeleteCategory(Request $request){
        $category = Category::where('id',$request->id)->delete();
       
        return Response()->json($category);
    }
}
