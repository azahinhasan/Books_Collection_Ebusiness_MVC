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

        return view('Employee.employeeSalaryList')->with('salaryList', $result)->with('giveSalaryOption', '')->with('userName', '')->with('salaryAmont', '');

    }

    public function giveSalaryOption($id){

        $data = DB::table('employeesalary')
                        ->get(); 

        $salaryInfo=DB::table('employeesalary')
                    ->where('ID',$id)
                    ->first(); 

        $result = json_decode($data, true);

        return view('Employee.employeeSalaryList')->with('salaryList', $result)->with('giveSalaryOption', $id)->with('userName', $salaryInfo->userName)->with('salaryAmont',$salaryInfo->Amount);

    }

}
