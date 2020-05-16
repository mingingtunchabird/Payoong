<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Todo;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    //

    public function index()
    {


        $countweb = Todo::where('type','like', 'Web Design')->count();
        $countuxui = Todo::where('type','like', 'UX/UI')->count();
        $countillustration = Todo::where('type','like', 'Illustration')->count();

        return view('admin/adminToptag')->with('countweb',$countweb)->with('countuxui',$countuxui)->with('countillustration',$countillustration);


    }


}
