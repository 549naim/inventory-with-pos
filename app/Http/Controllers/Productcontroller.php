<?php

namespace App\Http\Controllers;
use App\Models\Product;
use Illuminate\Http\Request;

use App\Exports\ProductsExport;

use Excel ;

class Productcontroller extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }

    public function add_product(){
        return view('add_product');
    }

    public function all_product(){
        $data=Product::all();
        return view('all_product',compact('data'));
    }

    public function insert_product(Request $request){
        $request->validate([
            'product_name'=>'required',
            'cate_id' =>  'required',
            'supplier_id' => 'required',
            'product_code'=>'required',
            'product_quantity'=>'required',
            'product_warehouse'=>'required',
            'product_route'=>'required',            
            'product_image'=>'required',
            'buy_date'=>'required',
            'expire_date'=>'required',
            'buying_price'=>'required',
            'selling_price'=>'required',
            
        ]);
        $data = new Product();
        $data->product_name = $request->product_name;
        $data->cate_id = $request->cate_id;
        $data->supplier_id = $request->supplier_id;
        $data->product_code = $request->product_code;
        $data->product_quantity = $request->product_quantity;
        $data->product_warehouse = $request->product_warehouse;
        $data->product_route = $request->product_route;

        $image_path = $request->file('product_image')->store('product_image', 'public');
        $data->product_image  = $image_path;   

        $data->buy_date = $request->buy_date;
        $data->expire_date = $request->expire_date;
        $data->buying_price = $request->buying_price;
        $data->selling_price = $request->selling_price;
       
        $data->save();
        return redirect('/add_product')->with('success', 'Product inserted Success');

    }

  
   
}
