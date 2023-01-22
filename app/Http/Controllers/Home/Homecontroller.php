<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\Expense;
use App\Models\Order;
use Illuminate\Http\Request;

class Homecontroller extends Controller
{
    public function homepage(){
        $sales = Order::all()->sum('total_product');
        $total = Order::all()->sum('total');
        $complete_order = Order::where(['order_status'=>'Complete'])->count();
        $total_expense = Expense::all()->sum('amount');
        $item = Order::where(['order_status'=>"Pending"])->get();
        return view('dashboard',compact('sales','total','complete_order','total_expense','item'));
    }
}
