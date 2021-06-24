<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class CustomerController extends Controller
{

    public function subscription(){
        $temp= ['id'=>1, 'sPrice'=>200, 'sCategory'=>6,'sUploadNumber'=>500];
        $temp2= ['id'=>1, 'sPrice'=>500, 'sCategory'=>6,'sUploadNumber'=>1000];
        return view('Customer.Subscription')->with('msg', '')->with('subscriptionS', $temp)->with('subscriptionP', $temp2);

    }
    public function subscriptionUpdate(){
        $temp= ['id'=>1, 'sPrice'=>200, 'sCategory'=>6,'sUploadNumber'=>500];
        $temp2= ['id'=>1, 'sPrice'=>500, 'sCategory'=>10,'sUploadNumber'=>1000];

        return view('Customer.Subscription')->with('msg', 'Data Updated')->with('subscriptionS', $temp)->with('subscriptionP', $temp2);

    }

    public function getUserInfo(){
        return [
            ['id'=>1, 'sPrice'=>200, 'sCategory'=>6,'sUploadNumber'=>500],
            //['id'=>2, 'Name'=>'aa', 'Email'=>'a@a.com','Rank'=>'Admin'],

        ];
    }

    public function SubscriptionUsersList($value){
        if($value=="all"){
            $user = DB::table('users')
            ->get(); 
        }else if($value=="premium"){
            $user = DB::table('users')
            ->where('Premium',  'true')
            ->get(); 
        }else{
            $user = DB::table('users')
            ->where('Premium',  'false')
            ->orwhere('premium',  null)
            ->get(); 
        }
        $result = json_decode($user, true);

        return view('Customer.Subscription.SubscriptionUsersList')->with('usersList',$result);

    }

    public function pieChart(){
        $Standerd = DB::table('users')
        ->where('Premium',  'true')
        ->get(); 
        $Premium = DB::table('users')
        ->where('premium',  'false')
        ->orwhere('premium',  null)
        ->get();
        $NotBanned = DB::table('users')
        ->where('BanStatus',  'false')
        ->orwhere('BanStatus',  null)
        ->get(); 
        $Banned = DB::table('users')
        ->where('BanStatus',  'true')
        ->get();  

        return view('Customer.pieChartSubscription')->with('Standerd',count($Standerd))->with('Premium',count($Premium))->with('NotBanned',count($NotBanned))->with('Banned',count($Banned));
    }
}
