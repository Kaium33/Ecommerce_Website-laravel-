<?php

namespace App\Http\Controllers;

use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Validator;
use DB;
// use Exception;

class SellerController extends Controller
{
    public function index(){

    	$userInfo = session('userInfo');

    	//return $userInfo;

    	return view('seller.index')->with('userInfo' , $userInfo);
    }

    public function profile(){
    	$userInfo = session('userInfo');

    	return view('seller.profile')->with('userInfo' , $userInfo);
    }

    public function productlist(){
    	$userInfo = session('userInfo');
    	$productsInfo = DB::select('select * from products');

    	return view('seller.productlist')->with('productsInfo' , $productsInfo);
    }




    public function showEditProfile($u_id){
    	$sql = DB::select("select * from user where u_id = (?)" , [$u_id]);

    	return view('seller.edit_profile')->with('profile', $sql);
    }

    public function editProfile(Request $req , $u_id){
    	$Validation = Validator::make($req->all() , [
            'name'=>'required|between:3,30',
            'password'=>'required|between:5,20',
            'email'=>'required|email',
            'address'=>'required',
            'mobile'=>'required|between:10,14',
            'status'=>'required',
            'date'=>'required'
        ]);
        $Validation->Validate();



    	$update = ['name' => $req->name,
    	'password' => $req->password,
    	'email' => $req->email, 
    	'address' => $req->address, 
    	'mobile' => $req->mobile,
    	'status' => $req->status,
    	'date' => $req->date,
    	'type' => $req->selectpicker];


    	// return $update;

    	// $sql = DB::update("update user set u_password = (?) , u_address = (?) , u_email = (?) , u_mobile = (?) , dob = (?) , u_status = (?) , u_type = (?) , first_name = (?) where u_id = (?)" , [$update['password'], $update['address'], $update['email'], $update['mobile'], $update['date'], $update['status'], $update['type'], $update['name'], $u_id]);
	    // 	error_log('Some message here.');

	    // $userDetail = DB::select('select * from user where u_id=(?)',[$u_id]);

	    // if($userDetail != []){
	    // 	session(['userInfo'=>$userDetail]);
	    // }

	    // return redirect('/seller/profile');
  


    	try{
	    	$sql = DB::update("update user set u_password = (?) , u_address = (?) , u_email = (?) , u_mobile = (?) , dob = (?) , u_status = (?) , u_type = (?) , first_name = (?) where u_id = (?)" , [$update['password'], $update['address'], $update['email'], $update['mobile'], $update['date'], $update['status'], $update['type'], $update['name'], $u_id]);
	    	error_log('Some message here.');


	    	$userDetail = DB::select('select * from user where u_id=(?)',[$u_id]);

	    	if($userDetail != []){
	    		session(['userInfo'=>$userDetail]);
	    	}

	    	return redirect('/seller/profile');

    	}catch(QueryException $exceptn){
    		return redirect('/seller/edit_profile/{$u_id}');
    	}
    }








    public function addproduct(){
    	return view('seller.addproduct');
    }

    public function addproductToDatabase(Request $req){
    	$Validation = Validator::make($req->all() , [
            'product_name'=>'required|between:3,30',
            'product_price'=>'required|between:2,10',
            'product_avlble'=>'required|between:1,10',
            'product_sell_price'=>'required|between:2,10',
            'product_original_price'=>'required|between:2,10',
            'category_id'=>'required|between:2,10'
        ]);
        $Validation->Validate();



    	$product = ['productName' => $req->product_name, 
    	'productPrice' => $req->product_price, 
    	'productAvlble' => $req->product_avlble, 
    	'productSellPrice' => $req->product_sell_price,
    	'productOriginalPrice' => $req->product_original_price,
    	'categoryId' => $req->category_id];
    	error_log('Some message here.');

    	try{
    		$sql = DB::insert("INSERT INTO `products`(`product_name`, `product_price`, `product_avlble`, `product_sell_price`, `product_original_price`, `category_id`) VALUES (?,?,?,?,?,?)" , [$product['productName'], $product['productPrice'], $product['productAvlble'], $product['productSellPrice'], $product['productOriginalPrice'], $product['categoryId']]);
    		
    		return redirect('/seller/productlist');
    	}catch(QueryException $exceptn){
    		return redirect('/seller/addproduct');
    	}
    }

    public function showOrderdProducts(){
    	$userInfo = session('userInfo');

    	// return $userInfo;

    	$productsInfo = DB::select("select * from order_t where seller_id = (?)" , [$userInfo[0]->u_id]);

    	// return $productsInfo;

    	return view('seller.orderd_products')->with('productsInfo' , $productsInfo);
    }


    public function showReturnRequest(){
    	$userInfo = session('userInfo');

    	$returnInfo = DB::select("select * from return_t where seller_id = (?)" , [$userInfo[0]->u_id]);

    	// return $productsInfo;

    	return view('seller.return_request')->with('returnInfo' , $returnInfo);
    }


    public function editReturnRequest($return_id){
    	$sql = DB::select("select * from return_t where return_id = (?)" , [$return_id]);

    	return view('seller.confirm_return_request')->with('product', $sql);
    }

    public function confirmReturnRequest(Request $req , $return_id){
    	// DB::delete("delete from products where product_id = (?)" [$product_id]);

    	
    	DB::table('return_t')->where('return_id' , $return_id)->delete();
    	error_log('Some message here.');

    	return redirect('/seller/return_request');
    }


    public function editPage($product_id){
    	$sql = DB::select("select * from products where product_id = (?)" , [$product_id]);

    	return view('seller.edit')->with('product', $sql);
    }

    public function updateProduct(Request $req , $product_id){
    	$Validation = Validator::make($req->all() , [
            'product_name1'=>'required|between:3,30',
            'product_price1'=>'required|between:2,10',
            'product_avlble1'=>'required|between:1,10',
            'product_sell_price1'=>'required|between:2,10',
            'product_original_price1'=>'required|between:2,10',
            'category_id1'=>'required|between:2,10'
        ]);
        $Validation->Validate();


    	$update = ['productName' => $req->product_name1, 
    	'productPrice' => $req->product_price1, 
    	'productAvlble' => $req->product_avlble1, 
    	'productSellPrice' => $req->product_sell_price1,
    	'productOriginalPrice' => $req->product_original_price1,
    	'categoryId' => $req->category_id1];

    	try{
	    	$sql = DB::update("update products set product_name = (?) , product_price = (?) , product_avlble = (?) , product_sell_price = (?) , product_original_price = (?) , category_id = (?) where product_id = (?)" , [$update['productName'], $update['productPrice'], $update['productAvlble'], $update['productSellPrice'], $update['productOriginalPrice'], $update['categoryId'], $product_id]);

	    	return redirect('/seller/productlist');
    	}catch(QueryException $exceptn){
    		return redirect('/seller/edit/{$product_id}');
    	}
    }

    public function deletePage($product_id){
    	$sql = DB::select("select * from products where product_id = (?)" , [$product_id]);

    	return view('seller.delete')->with('product', $sql);
    }

    public function deleteProduct(Request $req , $product_id){
    	// DB::delete("delete from products where product_id = (?)" [$product_id]);


    	DB::table('products')->where('product_id' , $product_id)->delete();
    	error_log('Some message here.');

    	return redirect('/seller/productlist');
    }

    public function orderConfirmation($order_id){
    	try{
    		$sql = DB::select("select * from order_t where order_id = (?)" , [$order_id]);

    		return view('seller.confirm_orderd_products')->with('order', $sql);
    	}catch(QueryException $exceptn){
    		return redirect('/seller/orderd_products');
    	}
    }

    public function deleteConfirmedOrder(Request $req , $order_id){
    	// DB::delete("delete from products where product_id = (?)" [$product_id]);

    	
    	DB::table('order_t')->where('order_id' , $order_id)->delete();
    	error_log('Some message here.');

    	return redirect('/seller/orderd_products');
    }
}
