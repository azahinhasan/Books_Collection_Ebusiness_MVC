

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
          @foreach ($usersInfo as $usersInfo)
          <tr>
               <th>Name</th>
               <th>{{$usersInfo['Name']}}</th>
          </tr>
          <tr>
               <th>Email</th>
               <th>{{$usersInfo['Email']}}</th>
          </tr>
          <tr>
               <th>Password</th>
               <th>
                    <input type="password" value="{{$usersInfo['Email']}}" disabled/> 
                    <a href="/chnageEmployeeAccess/{{'password'}}/{{$usersInfo['ID']}}"><button type="button" onclick="" class="btn btn-primary">R</button> </a> 
               </th>
          </tr>
          <tr>
               <th>Rank</th>
               <th>{{$usersInfo['Rank']}}</th>
          </tr>
          <tr>
               <th>BanStatus</th>
               <th>{{$usersInfo['BanStatus']}}</th>
          </tr>
          <tr>
               <th>Action</th>
               <th>
                    {{-- <button type="button" class="btn btn-primary">CHNAGE RANK</button> --}}
                   <a href="/chnageEmployeeAccess/{{$usersInfo['Rank']}}/{{$usersInfo['ID']}}"><button type="button" onclick="" class="btn btn-primary">CHNAGE RANK</button> </a> 
                    <br/>
                    <a href="/chnageEmployeeAccess/{{$usersInfo['BanStatus']==""?'false':'true'}}/{{$usersInfo['ID']}}"><button type="button" class="btn btn-danger">DISABLE ACCOUNT</button> </a> 
               </th>
          </tr>
          @endforeach
     </table>


	</form>
</body>
</html>