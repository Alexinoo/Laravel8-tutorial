<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;
use App\Exports\EmployeeExport;
use Excel;

class EmployeeController extends Controller
{

    public function index()
    {

        $employees = Employee::all();
        return view('Employee.index', compact('employees'));
    }
    public function create()
    {
        return view('Employee.create');
    }
    public function store(Request $request)
    {
        $employee = new Employee;
        $employee->name = $request->input('name');
        $employee->email = $request->input('email');
        $employee->phone = $request->input('phone');
        $employee->salary = $request->input('salary');
        $employee->department = $request->input('department');
        $employee->save();

        return redirect('employees')->with('status', 'Employee Added successfully');
    }

    // EXPORT INTO EXCEL
    public function exportIntoExcel()
    {
        return Excel::download(new EmployeeExport, 'employees.xlsx');
    }
    // EXPORT INTO CSV
    public function exportIntoCSV()
    {
        return Excel::download(new EmployeeExport, 'employees.csv');
    }
}
