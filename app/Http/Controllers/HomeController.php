<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\user;

class HomeController extends Controller
{
    public function index(){
        return view('home.userpage');
    }
    public function redirect()
    {
        $id = auth()->user()->id;
  
       // print_r($id);
        if($id == 1){
            return view('admin.home');
        
        }else{
            return view('home.userpage');
        }
    }
}
