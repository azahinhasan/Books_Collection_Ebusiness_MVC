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
      <div id='box' class="card">
         @if($bookList!='')
            @foreach ($bookList as $book)
            <span  id='DataBox' class="card-body">
               <div>{{$book['Name']}}</div>
               <div>{{$book['Price']}}</div>
               <div>{{$book['Rating']}}</div>
               <div>{{$book['ShopID']}}</div>
            </span>
         @endforeach
         @endif


      </div>
      </body>

</body>
</html>