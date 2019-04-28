<?php

namespace App\Http\Controllers;

use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use DB;

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

    public function addproduct(){
    	return view('seller.addproduct');
    }

    public function addproductToDatabase(Request $req){
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

    public function editPage($product_id){
    	$sql = DB::select("select * from products where product_id = (?)" , [$product_id]);

    	return view('seller.edit')->with('product', $sql);
    }

    public function updateProduct(Request $req , $product_id){
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

    public function deleteConfirmedOrder(Request $req , $product_id){
    	// DB::delete("delete from products where product_id = (?)" [$product_id]);

    	
    	DB::table('order_t')->where('order_id' , $product_id)->delete();
    	error_log('Some message here.');

    	return redirect('/seller/orderd_products');
    }
}
