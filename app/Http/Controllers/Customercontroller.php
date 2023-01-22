<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class Customercontroller extends Controller
{

    public function __construct() {
        $this->middleware('auth');
    }
    
    public function addcustomer(){
        return view('addcustomer');
        
    }

    public function customer_form(Request $request) {
        $request->validate([
            'name'=>'required',
            'email' => 'required|email|unique:customers|max:255|',
            'phone' => 'required',
            'address'=>'required',
            'shop_name'=>'required',
            'nid_number'=>'required',            
            'city'=>'required',
            
        ]);
       
        $data = new Customer();
        $data->name = $request->name;
        $data->email = $request->email;
        $data->phone = $request->phone;
        $data->address = $request->address;
        $data->shop_name = $request->shop_name;
        $data->nid_number = $request->nid_number;
        $image_path = $request->file('photo')->store('customer_image', 'public');
        $data->photo  = $image_path;      
        $data->bank_holder_name = $request->bank_holder_name;
        $data->bank_account_number = $request->bank_account_number;
        $data->bank_name = $request->bank_name;
        $data->bank_branch_name = $request->bank_branch_name;
        $data->city = $request->city;
        $data->save();
        return redirect('/addcustomer')->with('success', ' Customer Added successfully');
    }

    public function allcustomer(){
        $customers = Customer::simplePaginate(5);
        return view('allcustomer',compact('customers'));
    }

    public function customerdetails($id) {
      $data = Customer::find($id);
      return view('customerdetails', compact('data'));
    }
    public function edit_customer($id) {
        $data = Customer::find($id);
        return view('editcustomer', compact('data'));
    }

    public function update_customer($id , Request $request) {
        $request->validate([
            'name'=>'required',
            'email' =>  'required|email|max:255',
            'phone' => 'required',
            'address'=>'required',
            'shop_name'=>'required',
            'nid_number'=>'required',            
            'city'=>'required',
            
        ]);
       
        $data=Customer::find($id);


        if($request->hasFile('photo')){
            $path='storage/'.$data->photo;
            if(File::exists($path)) {
                File::delete($path);
            }
            $image=$request->photo;
            if($image){
              $image_path = $request->file('photo')->store('customer_image', 'public');
              $data->photo  = $image_path;
            }
          }

        $data->name = $request->name;
        $data->email = $request->email;
        $data->phone = $request->phone;
        $data->address = $request->address;
        $data->shop_name = $request->shop_name;
        $data->nid_number = $request->nid_number;      
        $data->bank_holder_name = $request->bank_holder_name;
        $data->bank_account_number = $request->bank_account_number;
        $data->bank_name = $request->bank_name;
        $data->bank_branch_name = $request->bank_branch_name;
        $data->city = $request->city;
        $data->save();
        return redirect('/allcustomer')->with('warning', ' Customer Edited successfully');
    }





    public function delete_customer($id) {
        $data=Customer::find($id);
        if($data->photo){
            $path='storage/'.$data->photo;
            if(File::exists($path)) {
                File::delete($path);
            }        
          }
          $data->delete();
          return redirect('/allcustomer')->with('error', ' Customer Deleted successfully');
    }

}
