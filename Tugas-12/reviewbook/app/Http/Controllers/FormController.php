<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FormController extends Controller
{
    public function showRegister()
    {      
        return view('register');
    }

    public function showWelcome()
    {      
        return view('sapa');
    }
}
