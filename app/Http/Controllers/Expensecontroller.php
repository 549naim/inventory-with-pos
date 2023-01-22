<?php

namespace App\Http\Controllers;

use App\Models\Expense;
use Illuminate\Http\Request;

class Expensecontroller extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function add_expense()
    {
        return view('add_expense');
    }

    public function all_expense()
    {
        $data = Expense::simplePaginate(10);
        $data = $data->sortByDesc("id");
        $amount = Expense::sum('amount');
        return view('all_expense', compact('data', 'amount'));
    }

    public function insert_expense(Request $request)
    {
        $request->validate([

            'amount' => 'required',


        ]);
        $month = date('F');
        $date = date('d/m/y');
        $year = date('Y');
        $data = new Expense();
        $data->details = $request->details;
        $data->amount = $request->amount;
        $data->month = $month;
        $data->year = $year;
        $data->date = $date;
        $data->Save();
        return redirect('/add_expense')->with('success', ' New Expense addes Successfullty');
    }

    public function today_expense()
    {

        $date = date('d/m/y');

        $data = Expense::where(['date' => $date])->get();
        $amount = Expense::where(['date' => $date])->sum('amount');
        return view('today_expense', compact('data', 'amount'));
    }

    public function this_month_expense()
    {
        $month_e = date('F');
        $year_e = date('Y');
        $data = Expense::where(['month' => $month_e])->get();
        $amount = Expense::where(['month' => $month_e])->sum('amount');
        return view('this_month_expense', compact('data', 'amount', 'month_e', 'year_e'));
    }

    public function monthly_expense(Request $request)
    {
        $request->validate([

            'month' => 'required',
            'year' => 'required',
        ]);
        $month_e = $request->month;
        $year_e = $request->year;
        $data = Expense::where(['month' => $month_e, 'year' => $year_e])->get();
        $amount = Expense::where(['month' => $month_e, 'year' => $year_e])->sum('amount');
        return view('this_month_expense', compact('data', 'amount', 'month_e', 'year_e'));
    }

    public function yearly_expense()
    {
        $year_e = date('Y');
        $data = Expense::where(['year' => $year_e])->get();
        $amount = Expense::where(['year' => $year_e])->sum('amount');
        return view('yearly_expense', compact('data', 'amount', 'year_e'));
    }

    public function find_yearly_expense(Request $request)
    {
        $request->validate([
            'year' => 'required',
        ]);

        $year_e = $request->year;
        $data = Expense::where(['year' => $year_e])->get();
        $amount = Expense::where(['year' => $year_e])->sum('amount');
        return view('yearly_expense', compact('data', 'amount', 'year_e'));
    }
}
