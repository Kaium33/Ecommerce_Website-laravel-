<!DOCTYPE html>
<html>
<head>
	<title>Login Page</title>
</head>
<body>

	<form method="post">
		<input type="hidden" name="_token" value="{{ csrf_token() }}">
		<fieldset>
			<legend>Login Form</legend>
			<table>
				<tr>
					<td>Useremail</td>
					<td><input type="text" name="uemail" value="{{old('uemail')}}"></td>
				</tr>
				<tr>
					<td>Password</td>
					<td><input type="password" name="password" value="{{old('password')}}"></td>
				</tr>
				<tr>
					<td></td>
					<td><input type="submit" name="submit" value="Submit"></td>
				</tr>
			</table>
			@foreach($errors->all() as $err)
			{{$err}} <br>
			@endforeach
		</fieldset>
	</form>
</body>
</html>