<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PDF;
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

                $pdf = PDF :: loadView('Employee.printCreatedUser');
                return $pdf->download('disney.pdf');
                // return view('Employee.printCreatedUser');
        
        }

        public function edit(){
                return view('Employee.empolyeeEdit')->with('msg','');
        }



        public function editPage(Request $r){
                $temp = $this->getUserInfo();
                $usersInfo='';


                foreach($temp as $u){
                if($u['id'] == $r->ID){
                        $usersInfo = $u;
                        break;
                }
                }
                if($usersInfo==''){
                        return view('Employee.empolyeeEdit')->with('msg','Data Not Found');
                }
                return view('Employee.employeeEditPage')->with('usersInfo', $usersInfo);
                
        
        }
        public function list(){
                $temp = $this->getUserInfo();
                return view('Employee.employeeList')->with('usersList', $temp);

        }


        public function getUserInfo(){
                return [
                     ['id'=>1, 'Name'=>'zz', 'Email'=>'a@a.com','Rank'=>'Admin'],
                     ['id'=>2, 'Name'=>'aa', 'Email'=>'a@a.com','Rank'=>'Admin'],
                     ['id'=>3, 'Name'=>'gg', 'Email'=>'a@a.com','Rank'=>'']
                ];
            }
}