<?php

namespace App\Http\Controllers;

use App\Models\Suppliers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class Suppliercontroller extends Controller
{

    public function __construct() {
        $this->middleware('auth');
    }


   public function addsupplier(){
    return  view('addsupplier');
   }

   public function supplier_form (Request $request){
    $request->validate([
        'name'=>'required',
        'email' =>  'required|email|max:255|unique:suppliers',
        'phone' => 'required',
        'address'=>'required',
        'type'=>'required',
        'shop_name'=>'required',
        'nid_number'=>'required',            
        'city'=>'required',
        
    ]);
    $data = new Suppliers();
    $data->name = $request->name;
    $data->email = $request->email;
    $data->phone = $request->phone;
    $data->address = $request->address;
    $data->shop_name = $request->shop_name;
    $data->nid_number = $request->nid_number;
    $data->type = $request->type;
    $image_path = $request->file('photo')->store('supplier_image', 'public');
    $data->photo  = $image_path;      
    $data->bank_holder_name = $request->bank_holder_name;
    $data->bank_account_number = $request->bank_account_number;
    $data->bank_name = $request->bank_name;
    $data->bank_branch_name = $request->bank_branch_name;
    $data->city = $request->city;
    $data->save();
    return redirect('/addsupplier');
   }

   public function allsupplier() {
    $suppliers = Suppliers::simplePaginate();
    return view('allsupplier', compact('suppliers'));
   }

   public function supplierdetails($id) {
    $data = Suppliers::find($id);
    return view('supplierdetails', compact('data'));
   }

   public function delete_supplier($id) {
    $data=Suppliers::find($id);
    if($data->photo){
        $path='storage/'.$data->photo;
        if(File::exists($path)) {
            File::delete($path);
        }        
      }
      $data->delete();
      return redirect('/allsupplier');   
}
public function edit_supplier($id){
    $data=Suppliers::find($id);
    return view('editsupplier',compact('data'));
}

public function update_supplier($id,Request $request){
    $request->validate([
        'name'=>'required',
        'email' =>  'required|email|max:255',
        'phone' => 'required',
        'address'=>'required',
        'shop_name'=>'required',
        'nid_number'=>'required',            
        'city'=>'required',
        
    ]);
   
    $data=Suppliers::find($id);


    if($request->hasFile('photo')){
        $path='storage/'.$data->photo;
        if(File::exists($path)) {
            File::delete($path);
        }
        $image=$request->photo;
        if($image){
          $image_path = $request->file('photo')->store('supplier_image', 'public');
          $data->photo  = $image_path;
        }
      }

    $data->name = $request->name;
    $data->email = $request->email;
    $data->phone = $request->phone;
    $data->address = $request->address;
    $data->shop_name = $request->shop_name;
    $data->nid_number = $request->nid_number;
    $data->type = $request->type;      
    $data->bank_holder_name = $request->bank_holder_name;
    $data->bank_account_number = $request->bank_account_number;
    $data->bank_name = $request->bank_name;
    $data->bank_branch_name = $request->bank_branch_name;
    $data->city = $request->city;
    $data->save();
    return redirect('/allsupplier');
}

}
