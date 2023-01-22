<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class Categorycontroller extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }
    
   public function add_category(){
    return view('add_category');
   }

   public function all_category(){
    $data = Category::all();
    return view('all_category',compact('data'));
   }

   public function insert_category(Request $request){
    $request->validate([
        'cate_name'=>'required',
                  
    ]);
   
    $data = new Category();
    if($data){
        $data->cate_name = $request->cate_name;
        $data->save();
        return redirect('/all_category')->with('success', ' Success');
    }else{
        return redirect('/add_category')->with('error', '');
    }       

   }

   public function delete_category($id){
    $data = Category::find($id);
    $data->delete();
    return redirect('/all_category')->with('success', 'Advance salary Success');
   }

   
}
