<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;

class StudentController extends Controller
{

    public function index()
    {
        $students  = Student::paginate(10);

        return view('Student.index', [
            'students' => $students
        ]);
    }
}
