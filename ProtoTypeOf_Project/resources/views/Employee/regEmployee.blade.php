<!DOCTYPE html>
<html>
<head>
	<title>Create user</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
</head>
<body>
@include('..NavBar');
<h3> Create New User</h3>

<form method="post">
		@csrf
	<table class="table">
		<tr>
			<td>Name</td>
			<td><input type="text" name="username"></td>
		</tr>
		<tr>
			<td>Address</td>
			<td><input type="text" name="password"></td>
		</tr>
     <tr>
			<td>DOB</td>
			<td><input type="date" name="name"></td>
		</tr>
     <tr>
			<td>Rank</td>
			<td>
                    <select>
                         <option>ADMIN</option>
                         <option>MODARATOR</option>
                    <select>
               </td>
		</tr>
		<tr>
			<td></td>
			<td><input type="submit" name="create" value="Create"></td>
		</tr>
	</table>
	</form>
</body>
</html>