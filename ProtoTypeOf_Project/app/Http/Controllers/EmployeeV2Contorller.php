<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class EmployeeV2Contorller extends Controller
{
    public function salaryList(){

        $data = DB::table('employeesalary')
                        ->get(); 

        $result = json_decode($data, true);

        return view('Employee.employeeSalaryList')->with('salaryList', $result)->with('giveSalaryOption', '')->with('userName', '')->with('salaryAmont', '')
                    ->with('userId','')->with('showPart','')->with('msg','');

    }


    public function confirmSalaryPageData($id,$msg){
        $data = DB::table('employeesalary')
        ->get(); 

        $salaryInfo=DB::table('employeesalary')
            ->where('ID',$id)
            ->first(); 

        $result = json_decode($data, true);

        return view('Employee.employeeSalaryList')->with('salaryList', $result)->with('giveSalaryOption', $id)->with('userName', $salaryInfo->userName)
        ->with('salaryAmont',$salaryInfo->Amount)->with('userId',$salaryInfo->userId)->with('showPart','add')->with('msg',$msg);
    }

    public function giveSalaryOption($id){

       return  $this->confirmSalaryPageData($id,'');

    }



    public function confirmSalary(Request $data,$id){


        $temp = DB::table('employeesalary')
        ->where('userId',  $data->userID)
        ->where('Year',$data->year)
        ->get(); 
        if(count($temp)<1){
            DB::table('employeesalary')->insert(
                ['userId' => $data->userID,
                'userName' => $data->userName,
                'Year' => $data->year,
                'Amount' =>  $data->salaryAmount,
                $data->month => 'true']);
    
        }

        if($data->action=='REMOVE'){

            DB::table('employeesalary')
                ->where('userId', $data->userID)
                ->where('Year',$data->year)
                ->update([$data->month => 'false']);
        }
        else{

            DB::table('employeesalary')
                ->where('userId', $data->userID)
                ->where('Year',$data->year)
                ->update([$data->month => 'true']);
           
        }

        return  $this->confirmSalaryPageData($id,'Data Updated!');
    }

}
