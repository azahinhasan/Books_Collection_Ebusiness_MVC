<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PDF;
use Illuminate\Support\Facades\DB;
class EmployeeController extends Controller
{
     //regEmployee
        public function create(){
        return view('Employee.regEmployee')->with('print',false);;

        }

        public function createSucess(){
                //return view('Employee.printCreatedUser');
                //$this->createSucessPrint();
                //return redirect()->route('Employee.printCreatedUser');
                return redirect('/emplpyee/print')->with('print',true);
              // return view('Employee.regEmployee')->with('print',true);
        
        }
        public function createSucessPage(){
               // $pdf = PDF::loadView('Employee.printCreatedUser');
        
                // $pdf = PDF :: loadView('Employee.printCreatedUser');
                // return $pdf->download('disney.pdf');
                return view('Employee.printCreatedUser');
        
        }
        public function createSucessPrint(){

                // $pdf = PDF :: loadView('Employee.printCreatedUser');
                // return $pdf->download('disney.pdf');


                // return view('Employee.printCreatedUser');
        
        }

        // public function edit(){
        //         return view('Employee.empolyeeEdit')->with('msg','');
        // }



        // public function editPage(Request $r){
        //         $temp = $this->getUserInfo();
        //         $usersInfo='';


        //         foreach($temp as $u){
        //         if($u['id'] == $r->ID){
        //                 $usersInfo = $u;
        //                 break;
        //         }
        //         }
        //         if($usersInfo==''){
        //                 return view('Employee.empolyeeEdit')->with('msg','Data Not Found');
        //         }
        //         return view('Employee.employeeEditPage')->with('usersInfo', $usersInfo);
                
        
        // }

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