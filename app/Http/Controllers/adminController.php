<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class adminController extends Controller
{
	public function admin(){
    	return view('admin.admin');
    }
    public function loginpage(){
    	return view('admin.login');
    }
    public function logincheck(Request $request){
    	$rules = [
    		'user' => 'required',
    		'password' => 'required',
    	];
    	$this->validate($request,$rules);
    	$data = DB::table('clients')->where('id',1)->first();
    	$userDB = $data->user;
    	$passDB = $data->password;

    	$user = $request->user;
    	$password = $request->password;

    	if($user==$userDB && $password== $passDB){
    		session(['user'=> $userDB]);
    		return redirect('/admin');
    	}else{
    		return redirect()->back();
    	}
    }
    public function logoutAdmin(){
    	session()->forget('user');
    	return redirect('/grocery/admin/login');
    }
}
