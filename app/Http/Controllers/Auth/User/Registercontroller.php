<?php

namespace App\Http\Controllers\Auth\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class Registercontroller extends Controller
{
    public function register(){
        return view('auth.register');
    }
    public function post_register(Request $request){

         $request->validate([
            'name'=>'required',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:8|confirmed',
            'password_confirmation'=>'required|min:8',
            // 'confirmpassword' => 'required|min:8|same:password',
        ]);
       
        $data = new User();
        $data->name = $request->name;
        $data->email = $request->email;
        $pass1=$request->password;
        $pass2=$request->password_confirmation;
        if($pass1 == $pass2) {
            $data->password = Hash::make($pass1);
        }
        else {
            return ["result"=>"operation failed"];
        }
      
        $data->save();
        return redirect('/login');
    }
}
