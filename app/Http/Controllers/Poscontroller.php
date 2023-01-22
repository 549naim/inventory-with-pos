<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Category;
use App\Models\Customer;
use App\Models\Order;
use App\Models\Orderdetail;
use App\Models\Product;
use Illuminate\Http\Request;

class Poscontroller extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }

    public function pos(){
        $data=Product::all();
        $customer=Customer::all(); 
        $category=Category::all();
        $cart=Cart::all();
        $total = 0;
        foreach ($cart as $key) {
            $subtotal = $key->qty*$key->price;
            $total +=$subtotal;
        }
        return view('pos',compact('data','customer','category','cart','total'));
    }

    public function add_cart(Request $request){
        $prod=$request->prod_id;
        $cheak = Cart::where(['prod_id'=>$prod])->exists();
        if(!$cheak){
            $request->validate([
                'prod_id'=>'required',
                'prod_name' =>  'required',
                'qty' => 'required',
                'price'=>'required',
            
            ]);
            $data = new Cart();
            $data->prod_id = $request->prod_id;
            $data->prod_name = $request->prod_name;
            $data->qty = $request->qty;
            $data->price = $request->price;
    
            $data->save();
            return redirect()->back()->with('success', 'Product added Success');
        }
        else{
            return redirect()->back()->with('warning', 'Product already added');
        }
        
    }

    public function update_cart_qtty($id , Request $request) {
          $data = Cart::find($id);
          $data->qty = $request->pro_qty;
          $data->save();
          return redirect()->back()->with('success', 'Product added Success');
    }
    public function delete_cart($id){
        $data = Cart::find($id);
        $data->delete();
        return redirect()->back()->with('success', 'Product added Success');
       }

       public function invoice(Request $request){
        $request->validate([
            'cus_id'=>'required',
        ]);
        $id = $request->cus_id;
       
        $data=Product::all();
        $customer=Customer::find($id); 
        $cart=Cart::all();
        $total = 0;
        foreach ($cart as $key) {
            $subtotal = $key->qty*$key->price;
            $total +=$subtotal;
        }
        return view('invoice',compact('data','customer','cart','total'));
        
        
    }  

    public function final_invoice(Request $request){
        $data = new Order();
        $data->customer_id = $request->customer_id;
        $data->order_date = $request->order_date;
        $data->order_status = $request->order_status;
        $data->total_product = $request->total_product;
        $data->subtotal = $request->subtotal;
        $data->vat = $request->vat;
        $data->total = $request->total;
        $data->payment_status = $request->payment_status;
        $data->pay = $request->pay;
        $data->due = $request->due;
        $data->save();  

        
        $cart=Cart::all();
        foreach ($cart as $key) {
            $o_d = new Orderdetail();
            $o_d->order_id = $data->id;
            $o_d->product_id = $key->prod_id;
            $o_d->qty = $key->qty;
            $o_d->unitcost = $key->price;
            $o_d->total = $key->qty * $key->price;
            $o_d->save();
        }
        Cart::destroy( $cart);
       
        return redirect()->route('pos');


        // ------------------*************************--------------------
//  alternative way

        // $cart = Cart::all();
//        $odata = array();
//        foreach ($cart as $content) {
//         $odata['order_id'] =$data->id;
//         $odata['product_id'] =$content->prod_id;
//         $odata['qty'] =$content->qty;
//         $odata['unitcost'] =$content->price;
//         $odata['total'] =$content->qty * $content->price;
//         $insert = DB::table('orderdetails')->insert($odata);
//        echo"<pre>";
//        print_r($odata);

      // ------------------*************************-------------------------
 
    }

    public function new_order() {
        $data = Order::where(['order_status'=>"Pending"])->get();
        return view('new_order',compact('data'));
    }

    public function all_order() {
        $data = Order::where(['order_status'=>"Complete"])->get();
        return view('all_order',compact('data'));
    }

    public function complete_order($id){
        $data = Order::find($id);
        $data->order_status = 'Complete';
        $data->save();
        return redirect()->back();
       
    }

    public function undo_order($id){
        $data = Order::find($id);
        $data->order_status = 'Pending';
        $data->save();
        return redirect()->back();
       
    }

    public function delete_order($id){
        $data = Order::find($id);
        $data->delete();
        return redirect()->back();
    }

}
