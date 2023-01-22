<?php

namespace App\Http\Controllers;

use App\Models\Advance_salary;
use App\Models\employee;
use App\Models\Salary;
use Illuminate\Http\Request;

class Advancesalarycontroller extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }

    public function add_advance_salary(){
        return view('add_advance_salary');
    }

    public function insert_advance_salary(Request $request){

        $request->validate([
            'emp_id'=>'required',
            'month' => 'required',
            'year'=>'required',
            'advance_salary'=>'required',           
        ]);
        $emp_id = $request->emp_id;
        $month = $request->month;
        $year = $request->year;
        $advance=  Advance_salary::where(['emp_id' => $emp_id , 'month'=>$month , 'year' => $year])->first();
        $data = new Advance_salary();
        if($advance===NULL){
            $data->emp_id = $emp_id;
            $data->month = $month;
            $data->year = $year;
            $data->advance_salary = $request->advance_salary;
            $data->save();
            return redirect('/add_advance_salary')->with('success', 'Advance salary Success');
        }else{
            return redirect('/add_advance_salary')->with('error', 'Advance salary Already given');
        }       
        
    }

    public function all_advance_salary(){
            $advance_sarary = Advance_salary::simplePaginate(5);
            return view('all_advance_salary',compact('advance_sarary'));
    }


    public function pay_salary(){
      
        $data = Employee ::all();
      
      
      
        return view('pay_salary',compact('data'));
    }

    public function confirm_salary_payment($id) {
        $data = Employee::find($id);
        return view('confirm_salary_payment', compact('data'));

    }

    public function insertsalary(Request $request ,$id){
        $salary_month = date('F', strtotime('-1 month'));
        $salary_year = date('Y', strtotime('-1 month'));
        $request->validate([
           
            'paid_salary'=>'required',           
        ]);
        $emp = Employee::find($id);
        $salary=  Salary::where(['emp_id' => $emp->id , 'month'=>$salary_month , 'year' => $salary_year])->first();
        $data = new Salary();
        if($salary===NULL){
            $data->emp_id = $emp->id;
            $data->month = $salary_month;
            $data->year = $salary_year;
            $data->salary = $request->paid_salary;
            $data->save();
            return redirect('/pay_salary')->with('success', ' salary give Successfullty');
        }else{
            return redirect('/pay_salary')->with('error', ' salary Already given');
        }       
        
    }


}
