<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Input;
use Illuminate\Support\Facades\Redirect;
use App\User;
use Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('admin');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.home');
    }
	
    public function normal()
    {
        return view('admin.home-normal');
    }
    
    public function info()
    {
        return view('admin.info');
    }
    public function upload(Request $request)
    {
        
        $this->validate($request, [
            'avatar' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $imageName = time().'.'.$request->avatar->getClientOriginalExtension();
        $request->avatar->move(public_path('images'), $imageName);

        User::where ("id", Auth::user()->id)->update(array('avatar' => $imageName));

    	return back()
    		->with('success','Image Uploaded successfully.')
    		->with('path',$imageName);
        
    }
}
