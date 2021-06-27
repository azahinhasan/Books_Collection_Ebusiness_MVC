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
        ->where('Premium',  'false')
        ->orwhere('premium',  null)
        ->get(); 
        $Premium = DB::table('users')
        ->where('premium',  'true')
     
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

    public function shopList(){
       
        $shopList=DB::table('shop')
                        ->get();
        $result = json_decode($shopList, true);
        return view('Shop.shopList')->with('shopList',$result);
    }

    public function shopVerify($id,$licence){
        $msg ='' ;
        $shopInfo=DB::table('shop')
                        ->where('Shop_id',$id)
                        ->get();
        $shopInfoLicence=DB::table('shop_licence')
                        ->where('Shop_Licence',$licence)
                        ->get();

        if(count($shopInfoLicence)<1){
            $msg='Shop Licence Is Not Valid!';
        }
        $result = json_decode($shopInfo, true);
        $result2 = json_decode($shopInfoLicence, true);

        return view('Shop.shopDetails')->with('shop_info',$result)->with('shop_licence',$result2)->with('msg',$msg);
    }

    public function shopVerifyConfirm($id,$licence){

        DB::table('shop')
        ->where('Shop_id', $id)
        ->update(['Verified_Status' => 'true']);

        return $this->shopVerify($id,$licence);
    }
}
