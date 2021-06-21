<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PDF;
use Illuminate\Support\Facades\DB;
class EmployeeController extends Controller
{
     //regEmployee
        public function create(){
        

        return view('Employee.regEmployee')->with('print',false)->with('msg','');

        }

        public function createSucess(Request $req){

                $temp = DB::table('users')
                ->where('Email', $req->Email )
                ->get();

             //  dd($temp);
//
                if(count($temp)>0){
                        return view('Employee.regEmployee')->with('print',false)->with('msg','Email Aready Taken');
                }

               $data= DB::table('users')->insert(
                        ['Email' => $req->Email,
                        'Address' => $req->Address,
                        'Name' => $req->Name,
                        'DOB' => $req->DOB,
                        'Password' => 'p',
                        'Rank' => $req->Rank]);

                if( $data== true){
                        $temp = DB::table('users')
                        ->where('Email', $req->Email )
                        ->first();

                        return redirect('/emplpyee/print/'.$temp->ID)->with('print',true);
                }

                return view('Employee.regEmployee')->with('print',false)->with('msg','Reg failed!');
        
        }
        public function createSucessPage($id){

                $temp = DB::table('users')
                ->where('ID',$id )
                ->get();
                $result = json_decode($temp, true);

               return view('Employee.printCreatedUser')->with('usersInfo', $result);
            

        
        }
        public function createSucessPrint($id){

                $temp = DB::table('users')
                ->where('ID',1)
                ->get();
                $result = json_decode($temp, true);

                $pdf = PDF :: loadView('Employee.printCreatedUser',['usersInfo'=> $result]);
                return $pdf->download('disney.pdf');


                return view('Employee.printCreatedUser')->with('usersInfo', $result);
        
        
        }

        public function editPage2($id){

                $usersInfo = DB::table('users')
                ->where('ID', $id )
                ->get(); 
                

                $result = json_decode($usersInfo, true);
                // if($usersInfo==''){
                //         return view('Employee.empolyeeEdit')->with('msg','Data Not Found');
                // }
               return view('Employee.employeeEditPage')->with('usersInfo', $result);
             
        }
        public static  function list(){

                $data = DB::table('users')
                        ->where('Rank', 'Admin' )
                        // ->where('Name', 'Admin')
                        ->orWhere('Rank', 'Moderator')
                        ->get(); 

                $result = json_decode($data, true);
                return view('Employee.employeeList')->with('usersList', $result)->with('msg','');
        }

        public   function listSearch(Request $r){
                $msg='';

                $data = DB::table('users')
                        ->where('ID',  $r->ID)
                        ->where('Rank', 'Moderator' )
                        ->orWhere('Rank', 'Admin')

                        ->get(); 
                
                if($data==''){
                       $this->list(); 
                }

                $result = json_decode($data, true);
                return view('Employee.employeeList')->with('usersList',  $result)->with('msg',$msg);

        }



        public function chnageEmployeeAccess($value,$id){

             
                
                if($value=='Admin'){
                        DB::table('users')
                        ->where('ID', $id)
                        ->update(['Rank' => 'Moderator']);
                }else if($value=='Moderator'){
                        DB::table('users')
                        ->where('ID', $id)
                        ->update(['Rank' => 'Admin']);
                }else if($value=='false'|| $value==null) {
                        DB::table('users')
                        ->where('ID', $id)
                        ->update(['BanStatus' => 'true']);
                }
                else if($value=='true') {
                        DB::table('users')
                        ->where('ID', $id)
                        ->update(['BanStatus' => 'false']);
                }else if($value=='password') {
                        $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
                        $pin = mt_rand(1000000, 9999999)
                                . mt_rand(1000000, 9999999)
                                . $characters[rand(0, strlen($characters) - 1)];
                                // shuffle the result
                        $string = str_shuffle($pin);
                        DB::table('users')
                        ->where('ID', $id)
                        ->update(['Password' =>$string]);
                }

                return redirect('/emplpyee/update/'.$id);
        }


        public function getUserInfo(){
                return [
                     ['id'=>1, 'Name'=>'zz', 'Email'=>'a@a.com','Rank'=>'Admin'],
                     ['id'=>2, 'Name'=>'aa', 'Email'=>'a@a.com','Rank'=>'Admin'],
                     ['id'=>3, 'Name'=>'gg', 'Email'=>'a@a.com','Rank'=>'']
                ];
            }
}