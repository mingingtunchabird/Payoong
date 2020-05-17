<?php

namespace App\Http\Controllers;

use App\Todo;
use Illuminate\Http\Request;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if(auth()->user()->isAdmin()) {

         $counts = Todo::all()->count();
         $todos = Todo::OrderBy('created_at','desc')->get();
         return view('admin/adminHome')->with('todos',$todos)->with('counts',$counts);

        } else {

            $todos = Todo::OrderBy('created_at','desc')->get();
            return view('user/userHome')->with('todos',$todos);
        }
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('user/create');
    }

    public function mywork()
    {
        $todos = Todo::OrderBy('created_at','desc')->get();
        return view('user/userMywork')->with('todos',$todos);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,
            [
                'title' => 'required',
                'type' => 'required',
                'file' => 'required|mimes:jpg,jpeg,png,gif|max:2048',
                'about' => 'required'
            ]
        );
        $file_name = time().'.'.$request->file->extension();
        $request->file->move(public_path('uploads'),$file_name);

        ($request->file());
        $todo = new Todo();
        $todo->title = $request->input('title');
        $todo->type = $request->input('type');
        $todo->file_name = $file_name;
        $todo->about = $request->input('about');
        $todo->save();

        return redirect('/home')->with('success','Create Success');



    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $todo = Todo::find($id);
        return view('user/edit')->with('todo',$todo);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $this->validate($request,
            [
                'title' => 'required',
                'type' => 'required',
                'about' => 'required'
            ]
        );
        $todo = Todo::find($id);
        $todo->title = $request->input('title');
        $todo->type = $request->input('type');
        $todo->about = $request->input('about');
        $todo->save();
        return redirect('/mywork')->with('success','Edit Successful ');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $todo = Todo::find($id);
        $todo->delete();
        return redirect('/home')->with('success','Delete Successful ');
    }

    public function search(Request $request)
    {
        $search = $request->get('search');
        if($search != ''){
            $todos = Todo::where('title','like', '%'.$search.'%')
                ->orWhere('type','like', '%'.$search.'%')
                ->paginate(3)
                ->setpath('');
            $todos->appends(array(
               'search' => $request->get('search') ,
            ));
            if (count($todos) >0){
                return view('user/userHome')->with('todos',$todos);
            }
            return redirect('/home')->with('notfound', 'No result');
        }

    }

//    public function filter(Request $request)
//    {
//         $filter = $request->get('filter');
//       dd($filter);
//
//        dd($filter);
//
//           $todos = Todo::where('type', 'like', '%' . $filter . '%')->paginate(3)->setpath('');
//            return view('user/userHome')->with('todos',$todos);
//
//
//
//    }

}
