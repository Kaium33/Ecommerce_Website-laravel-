<!DOCTYPE html>
<html>
<head>
	<title>Edit Profile</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
	<style>
		* {
		  box-sizing: border-box;
		}
		/** {
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
		}*/

		html {
		  font-family: "Lucida Sans", sans-serif;
		}

		ul {
		    list-style-type: none;
		    margin: 0;
		    padding: 0;
		    overflow: hidden;
		    background-color: #333;
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

		.right{
			float: right;
		}

		li {
		    float: left;
		}

		li:hover {
		  background-color: #0099cc;
		}

		li a {
		    display: block;
		    color: white;
		    text-align: center;
		    padding: 14px 16px;
		    text-decoration: none;
		}

		li a:hover {
		    background-color: #111;
		}
	</style>
</head>
<body>
	<div>
		<ul>
		    <li><a class="active" href="#home">Home</a></li>
		    <li><a class="active" href="/admin/profile">Profile</a></li>
		    <li><a class="active" href="/admin/add_vehicle">Add Vehicle</a></li>
		    <li><a class="active" href="/admin/all_vehicle">Vehicle List</a></li>
		    <li><a class="active" href="/admin/all_member">Members</a></li>
		    <!-- <li class="right"><a href="/authentication/registration">Registration</a></li> -->
		    <!-- <li class="right" onclick="location.href='/authentication/registration';"  style="cursor:pointer;">Registration</li> -->
		    <li class="right"><a href="/admin/logout">Logout</a></li>
		</ul>
	</div>
	<!-- class="col-6 col-s-9" --> 

	<div style="margin-left: 280px;margin-top: 70px; margin-right: 280px; background-color:hsla(120,60%,70%,0.3); border-radius: 25px;border: 2px solid #73AD21; padding: 20px">
		<form method="post">
				<input type="hidden" name="_token" value="{{ csrf_token() }}">
				<table border="0" width="450px" >
					<tr>
						<td width="40%">Name</td>
						<td width="2%">:</td>
						<td><input type="text"  name="name" value="{{old('name')}}"/></td>
					</tr>
					<tr>
						<td>Password</td>
						<td>:</td>
						<td><input type="text"  name="password" value="{{ old('password') }}"/></td>
					</tr>
					<tr>
						<td>Email</td>
						<td>:</td>
						<td><input type="text"  name="email" value="{{ old('email') }}"/></td>
					</tr>
					<tr>
						<td>Address</td>
						<td>:</td>
						<td><input type="text"  name="address" value="{{ old('address') }}"/></td>
					</tr>
					<tr>
						<td>Mobile</td>
						<td>:</td>
						<td><input type="text"  name="mobile" value="{{ old('mobile') }}"/></td>
					</tr>
					<tr>
						<td>Status</td>
						<td>:</td>
						<td><input type="text"  name="status" value="{{ old('status') }}"/></td>
					</tr>
					<tr>
						<td>Date of Berth</td>
						<td>:</td>
						<td><input type="date"  name="date" value="{{ old('date') }}"/></td>
					</tr>
					<tr>
						<td>Type</td>
						<td>:</td>
						<td><select  class="selectpicker" data-style="btn-info" name="selectpicker">
						    <option value="admin">Admin</option>
						    <option value="seller">Seller</option>
						</select></td>
					</tr>
					<tr>
						<td></td>
						<td></td>
						<td><button class="button" type="submit" value="Submit">Update</button></td>
					</tr>
				</table>
			</form>
			@foreach($errors->all() as $err)
			{{$err}} <br>
			@endforeach




	    </div>
	<div>
		
	</div>

</body>
</html>

<!-- @foreach($errors->all() as $err)
{{$err}} <br>
@endforeach -->