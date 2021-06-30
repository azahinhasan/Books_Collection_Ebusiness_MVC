<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class HomeZController extends Controller
{
    public function bookSearch(Request $data){

        return view('Home.bookSearchPage')->with('bookList', '');

    }
    public function bookSearcWithResults(Request $data){

        $temp = DB::table('books')
       // ->where('Name', $data->search)
       ->where('Name', 'like', '%'.$data->search.'%')
        ->get();
        $result = json_decode($temp, true);

        return view('Home.bookSearchPage')->with('bookList', $result);

    }

    public function login(){

            return view('Home.loginFrom')->with('msg', '');

    }

    public function loginPost(Request $data){
        $temp = DB::table('users')
        // ->where('Email',$data->Email)
        // ->where('Password',$data->Password)
        ->where('Email',$data->Email)
        ->where('Password',$data->Password)
        ->get();

        if(count($temp)<1){

            return view('Home.loginFrom')->with('msg', 'Invalid Data!');

        }

        $temp2 = DB::table('users')
        ->where('Email',$data->Email)
        ->where('BanStatus','true')
        // ->orwhere('BanStatus','')
        ->get();

        if(count($temp2)>0){

            return view('Home.loginFrom')->with('msg', 'Account Is Disabled!');

        }



        $data->session()->put('Email', $data->Email);
        $data->session()->put('Password', $data->Password);
        $data->session()->put('Rank', $temp[0]->Rank);

        return view('Employee.home')->with('bookList', '');

    }

    public function logOut(Request $req){

        $req->session()->flush();

        return redirect('/login');
        

    }

    //contactusPost

    public function contactus(Request $req){
        return view('Home.contactUs')->with('msg','');
    }

    public function contactusPost(Request $req){

        DB::table('contact_us')->insert(
            ['Name' => $req->Name,
            'Email' => $req->Email,
            'Msg'=>$req->Msg]);

            return view('Home.contactUs')->with('msg','Your Massage Send!');
    }

    

}
