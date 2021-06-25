<!DOCTYPE html>
<html>
<head>
	<title>Search Book</title>
   {{-- {{HTML::style('css/common.css')}} --}}
   <link href="{{ asset('/css/style.css') }}" rel="stylesheet">
</head>
<body>

      @include('..NavBar')
      <h3> Report List </h3>


      <form method="post">	
         @csrf
         <input name="search" type="text" />
         <input type="submit" name="submit" value="SEARCH"/>

      </form>
      <br/> <br/>
      <a href="" id='box' class="card">
         @if($bookList!='')
            @foreach ($bookList as $book)
            <span  id='DataBox' class="card-body">
               <table class="table">
                  <tr>
                     <th>Name</th>
                     <th>{{$book['Name']}}</th>
                  </tr>
                  <tr>
                     <td>Price</td>
                     <td>{{$book['Price']}}</td>
                  </tr>
                  <tr>
                     <td>Rating</td>
                     <td>{{$book['Rating']}}</td>
                  </tr>
                  <tr>
                     <td>ShopID</td>
                     <td>{{$book['ShopID']}}</td>
                  </tr>
               </table>
            </span>
         @endforeach
         @endif


      </a>
      </body>

</body>
</html>