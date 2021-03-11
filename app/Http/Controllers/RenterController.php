<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Renter;
use App\rent_bill;
use App\news;
use App\room;
use App\setting;
use App\package;
use App\repair;
use App\complain;
use Illuminate\Support\Facades\DB;
// use App\filters;


use App\Imports\EmployeeImport;
use Excel;
use RealRashid\SweetAlert\Facades\Alert;
use SebastianBergmann\Environment\Console;

class RenterController extends Controller
{
    //





    public function index()
    {

        // $filterrepair = DB::table('repair')->select('type_repair')->distinct()->get()->pluck('type_repair');


        // $filterrepair = $filterrepair->get()->append([
        //     'filrepair' => request('filrepair')
        // ]);

        // $repair  = repair::query();

        // if($request->filled('type_repair')){
        //     $repair->where('type_repair', $request->filterrepair);
        // }
        // return view('repair', [
        //     'type_repair'=>$filterrepair,
        //     'repair' => $repair->get()
        // ]);


    }

    public function importForm()
    {
        return view('import-form');
    }

    public function import(Request $request ){
        Excel::import(new EmployeeImport,$request->file);
        toast('เพิ่มไฟล์สำเร็จ','success')->autoClose(3000);
        return redirect('/home');
    }

    public function retrieve(){
        $renters = renter::select('firstname', 'roomid')->get();
        error_log($renters);
        return view('complain')->with('renters', $renters);
    }

    public function adduser()
    {

        $rooms = room::where('status', 0)->get();
        return view('create')->with('rooms',$rooms);

    }



    public function importuser(Request $request ){
        $this->validate($request,
            [
                'roomid' => 'required',
                'firstname' => 'required',
                'lastname' => 'required',
                'iden_num' => 'required',
                'email' => 'required',
                'phone' => 'required',
                'nationality' => 'required',
            ]
        );

        $url = (chr(rand(65,90)).chr(rand(65,90)).rand(0,9).rand(0,9).rand(0,9).rand(0,9));
        $renter = new Renter();
        $renter->roomid = $request->input('roomid');
        $renter->firstname = $request->input('firstname');
        $renter->lastname = $request->input('lastname');
        $renter->iden_num = $request->input('iden_num');
        $renter->email = $request->input('email');
        $renter->phone = $request->input('phone');
        $renter->nationality = $request->input('nationality');
        $renter->verify_code = $url;


        $renter->save();
        toast('เพิ่มลูกบ้านสำเร็จ','success')->autoClose(3000);
        return redirect('/home');


    }

    public function showbill()
    {

//        $id = 1;
        $settings = setting::all();
//        $rent_prices =  $setting -> rent_price ;

        $rooms = Renter::all();
        $todos = rent_bill::OrderBy('created_at','desc')->get();
        return view('addbill')->with('todos',$todos)->with('rooms',$rooms)->with('settings',$settings);
    }

    public function importbill(Request $request ){
        $this->validate($request,
            [
                'roomid' => 'required',
                'elec_price' => 'required',
                'pumb_price' => 'required',
            ]
        );

        $renter = new rent_bill();
        $renter->roomid = $request->input('roomid');
        $renter->elec_price = $request->input('elec_price');
        $renter->elec_rate = $request->input('elec_rate');
        $renter->pumb_price = $request->input('pumb_price');
        $renter->pumb_rate = $request->input('pumb_rate');
        $renter->rent_price = $request->input('rent_price');
        $renter->total = $renter->rent_price + ($renter->pumb_price * $renter->pumb_rate) + ($renter->elec_price * $renter->elec_rate) ;
        $renter->status = 0;
        $renter->save();
        toast('เพิ่มบิลสำเร็จ','success')->autoClose(3000);
        return redirect('/add-bill');
    }




    public function addnews(Request $request ){

        $this->validate($request,
            [
                'title' => 'required',
                'detail' => 'required',
            ]
        );

        $news = new news();
        $news->title = $request->input('title');
        $news->detail = $request->input('detail');
        $news->img = 1 ;

        //dd($renter);
        $news->save();
        toast('เพิ่มข่าวสารสำเร็จ','success')->autoClose(3000);
        return redirect('/news');
    }

    public function addComplain(Request $request){
        $this->validate($request,
            [
                'roomid' => 'required',
                'subtitle' => 'required',
            ]
        );
        $complain = new complain();
        $complain->roomid = $request->input('roomid');
        $complain->subtitle = $request->input('subtitle');

        $complain->save();
        toast('เพิ่มรายการร้องเรียนสำเร็จ','success')->autoClose(3000);
        return redirect('/complain');

    }

    public function shownews()
    {
        $news = news::OrderBy('created_at','desc')->get();
        return view('news')->with('news',$news);
    }

    public function showsetting()
    {

        $settings = setting::latest()->first();
//        $settings = setting::Orderby('created_at','desc')->get();
        return view('setting')->with('settings',$settings);;
    }

    public function addsetting(Request $request ){

        $this->validate($request,
            [
                'elec_rate' => 'required',
                'pumb_rate' => 'required',
                'rent_price' => 'required',
            ]
        );

//        $id = 1;
//        $setting = setting::find($id);

        $setting = new setting();
        $setting->rent_price = $request->input('rent_price');
        $setting->elec_rate = $request->input('elec_rate');
        $setting->pumb_rate = $request->input('pumb_rate');
        $setting->save();
        toast('ตั้งค่าสำเร็จ','success')->autoClose(3000);
        return redirect('/setting')->with('success','Save Success');


    }


    public function showpackage()
    {
        $rooms = Renter::all();
       // $rooms = room::where('status', 1)->get();
        $packages = package::Orderby('created_at','desc')->get();
        return view('package')->with('packages',$packages)->with('rooms',$rooms);;
    }










    public function addpackage(Request $request ){

        // $this->validate($request,
        //     [
        //         'pac_name' => 'required',
        //         'emp_name' => 'required',
        //         'trackid' => 'required',
        //         'roomid' => 'required',
        //     ]
        // );

        $package = new package();
        // $news->title = $request->input('title');
        $package->pac_name = $request->input('pac_name');
        $package->emp_name = $request->input('emp_name');
        $package->trackid = $request->input('trackid');
        $package->roomid = $request->input('roomid');
        $package->img = 'test' ;
        $package->status = 'ยังไม่รับ' ;



        $package->save();
        return redirect('/package')->with('success','Save Success');

        $search = $request->get('search');
        $rents = Renter::table('package')->where('roomid', '%'.$search. '%')->pagiante(5);

        return view('package', ['rents' => $rents]);


    }

    // public function addComplain(Request $request){
    //     $this->validate($request,
    //     [

    //     ]
    //     );
    // }

    public function addRepair(Request $request){
        // $this->validate($request,
        //     [
        //         'type_repair' => 'required',
        //         'day' => 'required',
        //         'time' => 'required',
        //         'img' => 'required',
        //     ]
        // );

        $repair = new repair();
        // $news->title = $request->input('title');
        $repair->roomid = $request->input('roomid');
        $repair->type_repair = $request->input('type_repair');
        $repair->day = $request->input('day');
        $repair->time = $request->input('time');
        $repair->status = 'ยังไม่ได้ซ่อม';
        $repair->img = 'test';





        $repair->save();
        return redirect('/repair')->with('success','Save Success');
    }

    // public function catagorize(Request $request){

    //     $status = repair::select('status')->get();
    //     return view('repair')->with('status',$status);

    // }


    public function showrepair()
    {

        $repairs = new repair();
        if(request()->has('type_repair')){
            $repairs = $repairs->where('type_repair', request('type_repair'));
        }
        $repairs = $repairs->get()->append([
            'type_repair' => request('type_repair'),
        ]);
        return view('repair')->with('repairs', $repairs);



        // if($repairs == null){
        //     return view('repair')->with('repairs', 'ยังไม่มีรายการแจ้งซ่อมนี้');
        // }

        // $renters = Renter::select('roomid', 'firstname')->get();
        $repairs = repair::Orderby('created_at','asc')->get();
        return view('repair')->with('repairs',$repairs);
    }

    public function complain()
    {
        $renters = Renter::select('roomid', 'firstname')->get();
        return view('complain')->with('renters', $renters);
    }

    public function acceptRepair($id)
    {
        $accept = repair::find($id);
        $accept->status="กำลังดำเนินการ";
        $accept->save();

        return redirect(Request::url());
    }

    public function genbill()
    {
        $genbills = rent_bill::all();
        return view('liff.genbill')->with('genbills',$genbills);
    }

    public function destroy($id){


        $package = Package::find($id);
        $package->delete();

        return redirect('/package')->with('success', 'Delete Success!');
    }







}
