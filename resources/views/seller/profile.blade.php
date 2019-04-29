<!DOCTYPE html>
<html>
<head>
	<title>Profile Page</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<style>
		* {
		  box-sizing: border-box;
		}

		.row::after {
		  content: "";
		  clear: both;
		  display: table;
		}

		[class*="col-"] {
		  float: left;
		  padding: 0px;
		}

		html {
		  font-family: "Lucida Sans", sans-serif;
		}
				
		.header {
		  background-color: Gray;
		  color: #ffffff;
		  padding: 1px;
		}

		.news {
		  border-bottom: 15px dashed #ddd;
		  /*padding: 5px;
		  color: #9D9C6A;
		  font-size: 0.9em;
		  margin-top: 10px;
		  margin-bottom: 10px;*/
		}

		.menu ul {
		  list-style-type: none;
		  margin: 0;
		  padding: 0;
		}

		.menu li {
		  padding: 8px;
		  margin-bottom: 15px;
		  background-color: #737373;
		  color: #ffffff;
		  text-align:center;
		  box-shadow: 0 1px 3px rgba(0,0,0,0.12), 0 1px 2px rgba(0,0,0,0.24);
		}

		.menu li:hover {
		  background-color: #0099cc;
		}

		.aside {
		  background-color: #33b5e5; /*#737373*/
		  padding: 15px;
		  color: #ffffff;
		  text-align: center;
		  font-size: 14px;
		  box-shadow: 0 1px 3px rgba(0,0,0,0.12), 0 1px 2px rgba(0,0,0,0.24);
		}

		.button{
		  background-color: #ff471a;
		  border: none;
		  color: white;
		  width:100px;
		  padding: 10px;
		  text-align: center;
		  font-size: 15px;
		  cursor: pointer;
		}

		.button:hover {
		  background-color: green;
		}

		.footer {
		  background-color: #0099cc;
		  color: #ffffff;
		  text-align: center;
		  font-size: 12px;
		  padding: 15px;
		}

		/* For mobile phones: */
		[class*="col-"] {
		  width: 100%;
		}

		@media only screen and (min-width: 600px) {
		  /* For tablets: */
		  .col-s-1 {width: 8.33%;}
		  .col-s-2 {width: 16.66%;}
		  .col-s-3 {width: 25%;}
		  .col-s-4 {width: 33.33%;}
		  .col-s-5 {width: 41.66%;}
		  .col-s-6 {width: 50%;}
		  .col-s-7 {width: 58.33%;}
		  .col-s-8 {width: 66.66%;}
		  .col-s-9 {width: 75%;}
		  .col-s-10 {width: 83.33%;}
		  .col-s-11 {width: 91.66%;}
		  .col-s-12 {width: 100%;}
		}
		@media only screen and (min-width: 768px) {
		  /* For desktop: */
		  .col-1 {width: 8.33%;}
		  .col-2 {width: 16.66%;}
		  .col-3 {width: 25%;}
		  .col-4 {width: 33.33%;}
		  .col-5 {width: 41.66%;}
		  .col-6 {width: 50%;}
		  .col-7 {width: 58.33%;}
		  .col-8 {width: 66.66%;}
		  .col-9 {width: 75%;}
		  .col-10 {width: 83.33%;}
		  .col-11 {width: 91.66%;}
		  .col-12 {width: 100%;}
		}
	</style>
</head>
<body>
	<div align="center" class="header">
  		<h2> {{$userInfo[0]->first_name}} </h2> 
	</div>

	<div class="row">
	  	<div class="col-3 col-s-3 menu" style="background-color:#333333; ">
		    <ul>
		      <li onclick="location.href='/seller/profile';"  style="cursor:pointer;  margin-top: 15px;">Profile</li>
		      <li onclick="location.href='/seller/addproduct';"  style="cursor:pointer;">Add Product</li>
		      <li onclick="location.href='/seller/productlist';"  style="cursor:pointer;">My Products</li>
		      <li onclick="location.href='/seller/orderd_products';"  style="cursor:pointer;">Orderd Product</li>
		      <li onclick="location.href='/seller/return_request';"  style="cursor:pointer;">Return Request</li>
		      <li onclick="location.href='/seller';"  style="cursor:pointer;">Home</li>
		      <li onclick="location.href='/logout';"  style="cursor:pointer;">logout</li>
		      <li>The City</li>
		      <li>The Island</li>
		    </ul>
	    </div>

	    <div class="col-6 col-s-9"  style="margin-left: 70px; margin-right: 70px;background-color:hsla(120,60%,70%,0.3); border-radius: 25px;border: 2px solid #73AD21; padding: 20px">
	    	<input type="hidden" name="_token" value="{{ csrf_token() }}">
	    	<table>
				<tr>
					<td width="35%">User Name</td>
					<td width="2%">:</td>
					<td>{{$userInfo[0]->first_name}}</td>
				</tr>
				<tr>
					<td>Id</td>
					<td>:</td>
					<td>{{$userInfo[0]->u_id}}</td>
				</tr>
				<tr>
					<td>Password</td>
					<td>:</td>
					<td>{{$userInfo[0]->u_password}}</td>
				</tr>
				<tr>
					<td>Type</td>
					<td>:</td>
					<td>{{$userInfo[0]->u_type}}</td>
				</tr>
				<tr>
					<td>DOB</td>
					<td>:</td>
					<td>{{$userInfo[0]->dob}}</td>
				</tr>
				<tr>
					<td>Email</td>
					<td>:</td>
					<td>{{$userInfo[0]->u_email}}</td>
				</tr>
				<tr>
					<td>Address</td>
					<td>:</td>
					<td>{{$userInfo[0]->u_address}}</td>
				</tr>
				<tr>
					<td>Mobile</td>
					<td>:</td>
					<td>{{$userInfo[0]->u_mobile}}</td>
				</tr>
				<tr>
					<td>Status</td>
					<td>:</td>
					<td>{{$userInfo[0]->u_status}}</td>
				</tr>
				<tr>
					<td></a></td>
					<td></td>
					<td><a href="{{ route('seller.edit_profile', [$userInfo[0]->u_id]) }}"><button class="button">Edit Profile</button></td>
				</tr>
			</table>
	    </div>
  	</div> 
</body>
</html>