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
}
