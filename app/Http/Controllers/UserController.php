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

    public function getMethod(Request $request)
    {

        return $request->method(); //returns GET
    }
    public function getPath(Request $request)
    {

        return $request->path(); //return getPath
    }
    public function getUrl(Request $request)
    {

        return $request->url(); //return http://127.0.0.1:8000/getUrl - NO PARAMETERS
    }

    public function getFullUrl(Request $request)
    {

        return $request->fullUrl(); //return http://127.0.0.1:8000/getFullUrl?name=Alex - WITH Parameters
    }
}
