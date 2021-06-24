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

        return view('Employee.employeeSalaryList')->with('salaryList', $result)->with('giveSalaryOption', '')->with('userName', '')->with('salaryAmont', '')->with('userId','')->with('showPart','');

    }

    public function giveSalaryOption($id){

        $data = DB::table('employeesalary')
                        ->get(); 

        $salaryInfo=DB::table('employeesalary')
                    ->where('ID',$id)
                    ->first(); 

        $result = json_decode($data, true);

        return view('Employee.employeeSalaryList')->with('salaryList', $result)->with('giveSalaryOption', $id)->with('userName', $salaryInfo->userName)
        ->with('salaryAmont',$salaryInfo->Amount)->with('userId',$salaryInfo->userId)->with('showPart','add');

    }

    public function deleteSalaryOption($id){

        $data = DB::table('employeesalary')
                        ->get(); 

        $salaryInfo=DB::table('employeesalary')
                    ->where('ID',$id)
                    ->first(); 

        $result = json_decode($data, true);

        return view('Employee.employeeSalaryList')->with('salaryList', $result)->with('giveSalaryOption', $id)->with('userName', $salaryInfo->userName)
        ->with('salaryAmont',$salaryInfo->Amount)->with('userId',$salaryInfo->userId)->with('showPart','delete');

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
                'Amount' => $data->salaryAmount,
                $data->month => 'true']);

                // ['userId' => '1',
                // 'userName' => '2']);
        }

        DB::table('employeesalary')
            ->where('userId', $data->userID)
            ->where('Year',$data->year)
            ->update([$data->month => 'true']);
        //return error_log('5');
        return $this->giveSalaryOption($id);
    }

}
