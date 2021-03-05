<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\package;

class PackageController extends Controller
{
    public function update($id){

        $accept = package::find($id);
        $accept->status="รับแล้ว";
        $accept->save();

        return redirect()->back();
    }

    public function index(){


        $packages = package::where('status','รับแล้ว')->get();

        return view('recieved')->with('packages', $packages);
    }

    public function destroy($id){


        $package = Package::find($id);
        $package->delete();

        return redirect('/recieved')->with('success', 'Delete Success!');
    }
    public function index2(){

        $packages = package::where('status','ยังไม่รับ')->get();

        return view('notrecieve')->with('packages', $packages);
    }
}
