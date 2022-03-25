<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use Brian2694\Toastr\Facades\Toastr;

class StudentController extends Controller
{

    public function index()
    {
        $students  = Student::orderBy('created_at', 'DESC')->paginate(7);

        return view('Student.index', [
            'students' => $students
        ]);
    }

    public function create()
    {
        return view('Student.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'regNo' => 'required',
            'name' => 'required',
            'course' => 'required',
        ]);

        if ($validatedData) {

            $student = new Student;
            $student->regNo = $validatedData['regNo'];
            $student->name = $validatedData['name'];
            $student->course = $validatedData['course'];
            $student->save();

            return redirect('students')->with('status', 'Student Added successfully');
        }
    }

    public function edit($id)
    {
        $student =  Student::find($id);
        return view('Student.edit', compact('student'));
    }


    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'regNo' => 'required',
            'name' => 'required',
            'course' => 'required',
        ]);

        if ($validatedData) {

            $student =  Student::find($id);
            $student->regNo = $validatedData['regNo'];
            $student->name = $validatedData['name'];
            $student->course = $validatedData['course'];
            $student->update();

            return redirect('students')->with('status', 'Student Updated Successfully');
        }
    }

    public function destroy($id)
    {
        $student =  Student::find($id);
        $student->delete();
        return redirect('students')->with('status', 'Student Deleted Successfully');
    }
}
