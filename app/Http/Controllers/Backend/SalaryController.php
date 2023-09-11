<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\AdvanceSalary;
use App\Models\Employee;
use Carbon\Carbon;
use Illuminate\Http\Request;

class SalaryController extends Controller
{
    public function advanceSalary(){
        $employees=Employee::latest()->get();
        return view('backend.salary.add_advance_salary', compact('employees'));
    }

    public function storeAdvanceSalary(Request $request){
        $validateData = $request->validate(
            [
                'employee_id' => 'required',
                'month' => 'required',
                'year' => 'required',
                'advance_salary' => 'required'
            ],
            [
                'employee_id.required' => 'Employee name must needed',
                'month.required' => 'Salary month must needed',
                'year.required' => 'Salary year must needed',
                'advance_salary.required' => 'Advance salary must needed'
            ]
        );

        $employee_id=$request->employee_id;
        $month=$request->month;
        $year=$request->year;
        $advance_salary=$request->advance_salary;
        $advance=AdvanceSalary::where('employee_id', $employee_id)->where('month', $month)->where('year', $year)->first();
        if($advance===NULL){
            AdvanceSalary::insert([
                'employee_id'=>$employee_id,
                'month'=>$month,
                'year'=>$year,
                'advance_salary'=>$advance_salary,
                'created_at'=>Carbon::now()
            ]);
            
        $notification = [
            'message' => 'Advance Salary Pay Success',
            'alert-type' => 'success',
        ];
        return redirect()
            ->route('all.advance.salary')
            ->with($notification);
        }else{
            $notification = [
                'message' => 'Advance Salary Already Paid Success',
                'alert-type' => 'warning',
            ];
            return redirect()
                ->back()
                ->with($notification);
        }
    }

    public function allAdvanceSalary(){
        $advance_salary=AdvanceSalary::latest()->get();
        return view('backend.salary.all_advance_salary', compact('advance_salary'));
    }
}
