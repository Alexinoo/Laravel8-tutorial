<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function index()
    {

        return view('login');
    }

    public function loginSubmit(Request $request)
    {

        // return $request->all(); //returns all the input fields 


        //Added Validation for Email/Password fields
        $validatedData = $request->validate([
            'email' => 'required | email',
            'password' => 'required | min:5|max:12'
        ]);

        $vEmail = $request->input('email');
        $vPassword = $request->input('password');

        return response()->json([
            'email' =>  $vEmail,
            'password' => $vPassword
        ]);
    }
}
