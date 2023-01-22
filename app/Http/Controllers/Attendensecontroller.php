<?php

namespace App\Http\Controllers;

use App\Models\Attendense;
use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Attendensecontroller extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }

    public function take_attendense(){
        $data = Employee::all();
        return view('take_attendense',compact('data'));
    }
    public function inser_attendense(Request $request){
        $request->validate([
            'att_date'=>'required',
            'attendense'=>'required',
            
        ]);
        $attdata = $request->att_date;
        $att_cheak=Attendense::where(['att_date'=>$attdata])->exists();
        if (!$att_cheak) {
            foreach($request->user_id as $id){
                $data[]=[
                    "user_id"=>$id,
                    "attendense"=>$request->attendense[$id],
                    "att_date"=>$request->att_date,
                ];
            }
            $newData = DB::table('attendenses')->insert($data);
            if ($newData) {
                return redirect('/take_attendense')->with('success', 'Attendense taken');
            }
            else{
                return redirect('/take_attendense')->with('error', 'operatrion failed');
            }
        } else{
            return redirect('/take_attendense')->with('error', 'attendense already taken');
        }
        
       
    }
    public function all_attendense(){
        $data = Attendense::all();
        $data = $data->sortByDesc("id");
        return view('all_attendense',compact('data'));
    }

    public function find_attendense(Request $request){
       $date = $request->att_date;
       $data=Attendense::where(['att_date'=>$date])->get();
       return view('all_attendense',compact('data'));

    }
    public function edit_attendense($id){
        $data = Attendense::find($id);
        return view('edit_attendense',compact('data'));

    }

    public function update_attendense($id , Request $request){
        $data = Attendense::find($id);
        $data->attendense = $request->attendense;
        $data->save();
        return view('edit_attendense',compact('data'))->with('success', 'attendense updated');
    }

}
