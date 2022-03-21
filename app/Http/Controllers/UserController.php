<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {

        $name = 'Jennifer';

        return view('user', compact('name'));
    }
}
