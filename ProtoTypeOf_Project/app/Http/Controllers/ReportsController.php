<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ReportsController extends Controller
{

    public function reportList(){
         $users = $this->getUserList();
         return view('checkReportList')->with('reportlist', $users);
    }
    public function userReports($id){
        $usersReports = $this->getUserReports();
        $usersInfoAll = $this->getUserInfo();
        $usersInfo='';
        $users=$usersReports;
        $msg='';

        foreach($usersInfoAll as $u){
            if($u['id'] == $id){
                $usersInfo = $u;
                break;
            }
        }

        foreach($usersReports as $u){
            if($u['GotRepotedID'] == $id){
               // $users = join(",",$u);
                
            }
        }

        return view('checkGotReportedUserInfo')->with('reports', $users)->with('usersInfo', $usersInfo)->with('msg', $msg);
   }
   public function userInfo(){
    $users = $this->getUserInfo();
    return view('userInfo')->with('userInfo', $users);
}

    public function getUserList(){
         return [
              ['id'=>1, 'GotRepotedID'=>1, 'RepoterID'=>'4'],
              ['id'=>2, 'GotRepotedID'=>2, 'RepoterID'=>'5'],
              ['id'=>3, 'GotRepotedID'=>3, 'RepoterID'=>'6'],
         ];
    } 
    
    public function getUserReports(){
        return [
             ['id'=>1, 'GotRepotedID'=>1, 'RepoterID'=>'4', 'Repoter'=>'BadPerson'],
             ['id'=>2, 'GotRepotedID'=>1, 'RepoterID'=>'7', 'Repoter'=>'BadPerson'],
             ['id'=>3, 'GotRepotedID'=>2, 'RepoterID'=>'5', 'Repoter'=>'BadPerson'],
        ];
    }

    public function getUserInfo(){
        return [
             ['id'=>1, 'Name'=>'zz', 'Email'=>'a@a.com','Rank'=>'Admin'],
             ['id'=>2, 'Name'=>'aa', 'Email'=>'a@a.com','Rank'=>'Admin'],
             ['id'=>3, 'Name'=>'gg', 'Email'=>'a@a.com','Rank'=>'Admin']
        ];
    }
}