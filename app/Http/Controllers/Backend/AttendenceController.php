<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Attendance;
use App\Models\Employee;
use Illuminate\Http\Request;

class AttendenceController extends Controller
{
    public function employeeAttendanceList(){
        $attendances=Attendance::orderBy('id', 'desc')->get();
        return view('backend.attendance.attendance_list', compact('attendances'));
    }

    public function addEmployeeAttendance(){
        $employees=Employee::all();
        return view('backend.attendance.add_attendance', compact('employees'));
    }
}
