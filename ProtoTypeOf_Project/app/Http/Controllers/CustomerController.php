<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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

    public function pieChart(){
        return view('Customer.pieChartSubscription')->with('Standerd',5)->with('Premium',5);
    }
}
