<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LoginController extends Controller
{
    public function index(){
    	return view('login.index');
    }

    public function verify(Request $req){
    	$user = ['email' => $req->uemail, 'password' => $req->password];

    	$userDetail = DB::select('select * from user where u_email=(?) and u_password=(?)',[$user['email'],$user['password']]);

    	if($userDetail != []){
    		session(['userInfo'=>$userDetail]);
    		// $userInfo = session('userInfo');


    		// error_log('Some message here.');

    		return redirect('/seller');
    	}
    	else{
    		$req->session()->flash('msg', "Invalid username/password");
    		return redirect('/login');
    	}





    	// $user = DB::table('user')->where('u_email', $req->uemail)
    	// ->where('u_password',$req->password)
    	// ->first();

    	// if($user){
    	// 	$req->session()->put('name',$req->first_name);
    	// 	return redirect()->route('seller.index');
    	// }
    	// else{
    	// 	$req->session()->flash('msg', "Invalid username/password");
    	// 	return redirect('/login');
    	// }
    }
}
