<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
class Settingcontroller extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }

    public function edit_setting(){
        $data = Setting::all();
        $data = $data->first();
        return view('edit_setting',compact('data'));
    }

    public function update_setting(Request $request){
       
            $data = Setting::all();
            $data = $data->first();
            $request->validate([
                'company_name'=>'required',
                'company_email' =>  'required|email|max:255',
                'company_address' => 'required',
                'company_phone'=>'required',               
                'company_city'=>'required',               
                'company_country'=>'required',               
                'company_zipcode'=>'required',               
            ]);
    
           
            if($request->hasFile('company_logo')){
              $path='storage/'.$data->company_logo;
              if(File::exists($path)) {
                  File::delete($path);
              }
              $image=$request->company_logo;
              if($image){
                $image_path = $request->file('company_logo')->store('company_logo', 'public');
                $data->company_logo  = $image_path;
              }
            }
            $data->company_name = $request->company_name;
            $data->company_email = $request->company_email;
            $data->company_address = $request->company_address;
            $data->company_phone = $request->company_phone;
            $data->company_city = $request->company_city;
            $data->company_country = $request->company_country;
            $data->company_zipcode = $request->company_zipcode;
            $data->save();
            return redirect('/homepage')->with('success', 'Settings editedSuccess');
    }

}
