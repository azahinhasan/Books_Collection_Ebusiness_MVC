<!DOCTYPE html>
<html>
<head>
	<title>Create user</title>
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
</head>
<body>
     @include('.NavBar')
     <br/>
     <h3> User Details </h3>
     
	<form method="get">
     <table class="table">
          @foreach ($usersInfo as $user)
          <tr>
               <th>Name</th>
               <th>{{$user['Name']}}</th>
          </tr>
          <tr>
               <th>Email</th>
               <th>{{$user['Email']}}</th>
          </tr>
          <tr>
               <th>DOB</th>
               <th>{{$user['DOB']}}</th>
          </tr>
          <tr>
               <th>BanStatus</th>
               <th>{{$user['BanStatus']}}</th>
          </tr>
          <tr>
               <th></th>
               <th> 
               @if($user['BanStatus'] == 'true')
                    <a href="/banAccount/true/{{$user['ID']}}">
                         <button type="button" class="btn btn-warning">
                              UNBAN
                         </button> 
                    </a> 
               
               @else
                    <a href="/banAccount/false/{{$user['ID']}}">
                         <button type="button" class="btn btn-danger">
                              BAN
                         </button> 
                    </a> 
               
               @endif
               </th>
          </tr>
          @endforeach
     </table>


     <h2>Reports List</h2>
     <br/>
     <table class="table">
          <tr>
               <th>GotRepotedID</th>
               <th>Reporter</th>
               <th>Text</th>
          </tr>
          @foreach ($reports as $user)
               <tr>
                    <td>{{$user['gotReported']}}</td>
                    <td>{{$user['reporter']}}</td>
                    <td>{{$user['text']}}</td>
                    
               </tr>
          @endforeach
     </table>


     
	</form>
</body>
</html>