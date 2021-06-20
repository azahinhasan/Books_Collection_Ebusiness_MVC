<!DOCTYPE html>
<html>
<head>
	<title>Create user</title>
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
</head>
<body>
     @include('.NavBar');
     <br/>
     <h3> User Details </h3>

     
	<form method="get">
     <table class="table">
          <tr>
               <th>Name</th>
               <th>{{$usersInfo['Name']}}</th>
          </tr>
          <tr>
               <th>Email</th>
               <th>{{$usersInfo['Email']}}</th>
          </tr>
     </table>


     <table class="table">
          <tr>
               <th>GotRepotedID</th>
               <th>RepoterID</th>
               <th>Repoter</th>
          </tr>
          @foreach ($reports as $user)
               <tr>
                    <td>{{$user['GotRepotedID']}}</td>
                    <td>{{$user['RepoterID']}}</td>
                    <td>{{$user['Repoter']}}</td>
                    
               </tr>
          @endforeach
     </table>
     <button type="button" class="btn btn-danger">BAN/UNBAN</button>
	</form>
</body>
</html>