<?php

namespace App\Http\Controllers;
use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class Employeecontroller extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }

    public function addEmployee(){
        return view('addemployee');   
    }

    public function allEmployee(){
        $employees = Employee::simplePaginate(5);
        return view('allemployee',compact('employees'));   
    }

    public function employee_form( Request $request){
        $request->validate([
            'name'=>'required',
            'email' => 'required|email|max:255|unique:employees',
            'phone' => 'required',
            'address'=>'required',
            'experience'=>'required',
            'nid_number'=>'required',
            'photo'=>'required',
            'salary'=>'required',
            'vacation'=>'required',
            'city'=>'required',
            
        ]);
       
        $data = new Employee();
        $data->name = $request->name;
        $data->email = $request->email;
        $data->phone = $request->phone;
        $data->address = $request->address;
        $data->experience = $request->experience;
        $data->nid_number = $request->nid_number;
        $image_path = $request->file('photo')->store('employee_image', 'public');
        $data->photo  = $image_path;      
        $data->salary = $request->salary;
        $data->vacation = $request->vacation;
        $data->city = $request->city;
        $data->save();
        return redirect('/addemployee');
    }

    public function edit_employee($id) {
        $employee = Employee::find($id);
        return view('employee_edit_form',compact('employee'));
    }

    public function update_employee($id , Request $request) {
        $request->validate([
            'name'=>'required',
            'email' =>  'required|email|max:255',
            'phone' => 'required',
            'address'=>'required',
            'experience'=>'required',
            'nid_number'=>'required',
          
            'salary'=>'required',
            'vacation'=>'required',
            'city'=>'required',
            
        ]);

        $data=Employee::find($id);
        if($request->hasFile('photo')){
          $path='storage/'.$data->photo;
          if(File::exists($path)) {
              File::delete($path);
          }
          $image=$request->photo;
          if($image){
            $image_path = $request->file('photo')->store('employee_image', 'public');
            $data->photo  = $image_path;
          }
        }
        $data->name = $request->name;
        $data->email = $request->email;
        $data->phone = $request->phone;
        $data->address = $request->address;
        $data->experience = $request->experience;
        $data->nid_number = $request->nid_number;
        $data->salary = $request->salary;
        $data->vacation = $request->vacation;
        $data->city = $request->city;
        $data->save();
        return redirect('/allemployee');

    }

    public function delete_employee($id) {
        $data=Employee::find($id);
        if($data->photo){
            $path='storage/'.$data->photo;
            if(File::exists($path)) {
                File::delete($path);
            }        
          }
          $data->delete();
          return redirect('/allemployee');   
    }


}
