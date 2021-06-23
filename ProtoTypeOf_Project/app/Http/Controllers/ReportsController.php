<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class ReportsController extends Controller
{

    public function reportList(){
        $data = DB::table('reports')
        ->get(); 

    $result = json_decode($data, true);

    return view('Customer.checkReportList')->with('reportlist', $result)->with('msg','');
    }
    public function userReports($id){
        $userInfo = DB::table('users')
        ->where('ID', $id )
        ->get();

        $hisALLReports = DB::table('reports')
        ->where('gotReported', $id )
        ->get();

        $usersInfo2 = json_decode($userInfo, true);
        $reports = json_decode($hisALLReports, true);

        return view('Customer.checkGotReportedUserInfo')->with('reports', $reports)->with('usersInfo', $usersInfo2)->with('msg', '');
   }

   public function userInfo(){
    $users = $this->getUserInfo();
    return view('userInfo')->with('userInfo', $users);
}

   public function banAccount($value,$id){

             $msg='';
                
                if($value=='false'|| $value==null) {
                        DB::table('users')
                        ->where('ID', $id)
                        ->update(['BanStatus' => 'true']);
                        $msg='Account Disabled!';
                }
                else if($value=='true') {
                        DB::table('users')
                        ->where('ID', $id)
                        ->update(['BanStatus' => 'false']);
                        $msg='Account Enabled!';
                }

                return redirect('/reportList/'.$id)->with('msg',$msg);
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