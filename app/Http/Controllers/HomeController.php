<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {

        return 'Hi from HomeController';
    }
    public function edit($id)
    {

        return 'Edit id : ' . $id;
    }
}
