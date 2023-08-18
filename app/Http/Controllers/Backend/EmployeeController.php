<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Employee;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class EmployeeController extends Controller
{
    function allEmployee()
    {
        $employees = Employee::latest()->get();
        return view('backend.employee.all_employee', compact('employees'));
    }
    // addEmployee
    function addEmployee()
    {
        return view('backend.employee.add_employee');
    }
    // storeEmployee
    function storeEmployee(Request $request)
    {
        $validateData = $request->validate(
            [
                'name' => 'required',
                'email' => 'required|unique:employees|max:200',
                'phone' => 'required|max:200',
                'address' => 'required|max:400',
                'exprience' => 'required',
                'salary' => 'required',
                'vacation' => 'required',
                'city' => 'required',
                'empImg' => 'required|jpg|png|jpeg',
            ],
            [
                'name.required' => 'Employee name must needed',
                'email.required' => 'Employee email must needed and valid',
                'phone.required' => 'Employee phone must needed',
                'address.required' => 'Employee address must needed',
                'salary.required' => 'Employee current salary must needed',
                'exprience.required' => 'Employee exprience must needed',
                'vacation.required' => 'Employee vacation must needed',
                'city.required' => 'Employee city must needed',
                'empImg.required' => 'Employee image must needed and type must be jpg/png/jpeg',
            ]
        );
        $image = $request->file('empImg');
        $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
        Image::make($image)->resize(300, 300)->save('upload/emp_image' . $name_gen);
        $save_url = 'upload/emp_image' . $name_gen;
        Employee::insert(
            [
                'name' => $request->name,
                'email' => $request->email,
                'phone' => $request->phone,
                'address' => $request->address,
                'exprience' => $request->exprience,
                'image' => $save_url,
                'salary' => $request->salary,
                'vacation' => $request->vacation,
                'city' => $request->city,
                'created_at' => Carbon::now()
            ],
        );
        $notification = [
            'message' => 'Employee Added Success',
            'alert-type' => 'success',
        ];
        return redirect()
            ->route('all.employee')
            ->with($notification);
    }
    // editEmployee
    function editEmployee($id)
    {
        $employeeData = Employee::findOrFail($id);
        return view('backend.employee.edit_employee', compact('employeeData'));
    }
    // updateEmployee
    function updateEmployee(Request $request)
    {
        $validateData = $request->validate(
            [
                'name' => 'required',
                'email' => 'required|max:200',
                'phone' => 'required|max:200',
                'address' => 'required|max:400',
                'exprience' => 'required',
                'salary' => 'required',
                'vacation' => 'required',
                'city' => 'required'
            ],
            [
                'name.required' => 'Employee name must needed',
                'email.required' => 'Employee email must needed and valid',
                'phone.required' => 'Employee phone must needed',
                'address.required' => 'Employee address must needed',
                'salary.required' => 'Employee current salary must needed',
                'exprience.required' => 'Employee exprience must needed',
                'vacation.required' => 'Employee vacation must needed',
                'city.required' => 'Employee city must needed'
            ]
        );
        $findEmp=Employee::find($request->id);

        if($request->file('empImg') !=''){
            @unlink(public_path($findEmp->image));
            $image = $request->file('empImg');
            $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
            Image::make($image)->resize(300, 300)->save('upload/emp_image' . $name_gen);
            $save_url = 'upload/emp_image' . $name_gen;
            $findEmp->image=$save_url;
        }
        $findEmp->name=$request->name;
        $findEmp->email=$request->email;
        $findEmp->phone=$request->phone;
        $findEmp->address=$request->address;
        $findEmp->salary=$request->salary;
        $findEmp->exprience=$request->exprience;
        $findEmp->vacation=$request->vacation;
        $findEmp->city=$request->city;
        $findEmp->updated_at=Carbon::now();
        $findEmp->save();
        $notification = [
            'message' => 'Employee Update Success',
            'alert-type' => 'success',
        ];
        return redirect()
            ->route('all.employee')
            ->with($notification);
    }

    // deleteEmployee
    function deleteEmployee($id){
        $findImage=Employee::findOrFail($id);
        $image=$findImage->image;
        unlink($image);
        Employee::findOrFail($id)->delete();
        $notification = [
            'message' => 'Employee Delete Success',
            'alert-type' => 'success',
        ];
        return redirect()
            ->route('all.employee')
            ->with($notification);
    }
}
