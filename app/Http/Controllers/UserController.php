<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {

        $name = 'Jennifer';

        $userDetails = array(
            'name' => 'John Smith',
            'email' => 'johnsmith@test.com',
            'phone' => '0755543918',
        );

        return view('user', compact('name', 'userDetails'));
    }
}
