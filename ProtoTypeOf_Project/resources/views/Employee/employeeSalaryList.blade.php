<!DOCTYPE html>
<html>
<head>
	<title>ADMIN</title>

     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
</head>
<body>

      @include('..NavBar')
      <h3> Report List </h3>

   <form method="post">

      @if($giveSalaryOption != '')
         <table class="table">
            <tr>
               <td><input value='{{$giveSalaryOption}}' disabled name="ID"/></td>
               <td><input value='{{$userName}}' disabled name='userName'/></td>
               <td><input value='{{$salaryAmont}}' disabled name='salaryAmount'/></td>
               <td>
                  <select  name='month'>
                     <option>January</option>
                     <option>February</option>
                     <option>March</option>
                     <option>April</option>
                     <option>May</option>
                     <option>July</option>
                     <option>August</option>
                     <option>August</option>
                  </select>
               </td>
               <td>
                  <select  name='year'>
                     <option>2021</option>
                     <option>2022</option>
                  </select>
               </td>
               <td>
                  <input type='submit' value='SAVE'/>
               </td>
            </tr>
         </table>
      @endif
   </form>   

   <form method="get">
      <table class="table">
            <tr>
               <th>UserID</th>
               <th>Name</th>
               <th>January</th>
               <th>February</th>
               <th>March</th>
               <th>April</th>
               <th>May</th>
               <th>June</th>
               <th>July</th>
               <th>August</th>
               <th>September</th>
               <th>October</th>
               <th>Year</th>
               <th>Action</th>
            </tr>
            @foreach ($salaryList as $user)
            <tr>
               <td>{{$user['userId']}}</td>
               <td>{{$user['userName']}}</td>
               <td>{{$user['January']}}</td>
               <td>{{$user['February']}}</td>
               <td>{{$user['March']}}</td>
               <td>{{$user['April']}}</td>
               <td>{{$user['May']}}</td>
               <td>{{$user['June']}}</td>
               <td>{{$user['July']}}</td>
               <td>{{$user['August']}}</td>
               <td>{{$user['September']}}</td>
               <td>{{$user['October']}}</td>
               <td>{{$user['Year']}}</td>
               <td><a href="/employee/giveSalary/{{$user['ID']}}">Give Salary</a></td>
            </tr>
            @endforeach
      </table>
      </body>
	</form>
</body>
</html>