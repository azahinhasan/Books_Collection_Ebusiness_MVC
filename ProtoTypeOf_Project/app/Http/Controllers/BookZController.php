<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class BookZController extends Controller
{
    public function bookSearch(Request $data){

        return view('Home.bookSearchPage')->with('bookList', '');

    }
    public function bookSearcWithResults(Request $data){

        $temp = DB::table('books')
       // ->where('Name', $data->search)
        ->get();
        $result = json_decode($temp, true);


        return view('Home.bookSearchPage')->with('bookList', $result);

    }

}
