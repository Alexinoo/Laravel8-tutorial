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
        $vEmail = $request->input('email');
        $vPassword = $request->input('password');

        return response()->json([
            'email' =>  $vEmail,
            'password' => $vPassword
        ]);
    }
}
