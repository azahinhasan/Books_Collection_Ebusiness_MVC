<!DOCTYPE html>
<html>
<head>
	<title>Print</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
</head>
<body>
{{-- @include('..NavBar') --}}
{{-- <h3> New User</h3> --}}

<form method="post">
		@csrf
	<table class="table">
		<tr>
			<td>Name</td>
			<td>None</td>
		</tr>
      <tr>
			<td>Password</td>
         <td>None</td>
		</tr>
		<tr>
			<td>Address</td>
         <td>None</td>
		</tr>
     <tr>
			<td>DOB</td>
			<td>None</td>
		</tr>
     <tr>
			<td>Rank</td>
			<td>None</td>
		</tr>
		<tr>
			<td></td>
			<td><input type="submit" name="create" value="PRINT"></td>
		</tr>
	</table>
	</form>
</body>
</html>