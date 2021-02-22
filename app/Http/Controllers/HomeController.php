<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

     /**
     * Display a listing of the myform.
     *
     * @return \Illuminate\Http\Response
     */
    public function myform()
    {
    	return view('myform');
    }


    /**
     * Display a listing of the myformPost.
     *
     * @return \Illuminate\Http\Response
     */
    public function myformPost(Request $request)
    {


    	$validator = Validator::make($request->all(), [
            'first_name' => 'required|max:2',
            'last_name' => 'required',
            'email' => 'required|email',
            'address' => 'required',
        ]);


        if ($validator->passes()) {


			return response()->json(['success'=>'Added new records.', 'url'=> '/']);
        }


    	return response()->json(['error'=>$validator->errors()]);
    }



}
