<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\repair;

class StatusController extends Controller
{
    //


    public function update($id){

        $accept = repair::find($id);
        $accept->status="กำลังดำเนินการ";
        $accept->save();

        return redirect()->back();
    }

    public function update2($id){

        $accept = repair::find($id);
        $accept->status="ซ่อมแล้ว";
        $accept->save();

        return redirect()->back();
    }

    public function index(){


        $repairs = repair::where('status','กำลังดำเนินการ')->get();

        return view('processing')->with('repairs', $repairs);
    }

    public function index2(){

        $repairs = repair::where('status','ซ่อมแล้ว')->get();

        return view('statusDone')->with('repairs', $repairs);
    }


}
