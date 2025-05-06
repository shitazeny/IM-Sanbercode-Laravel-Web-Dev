<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserForm;

class FormController extends Controller
{
    public function showRegister()
    {      
        return view('register');
    }

    public function addRegister(Request $request)
    {
        $validated = $request->validate([
            'first_name' => 'required|string|max:100',
            'last_name' => 'required|string|max:100',
            'gender' => 'required|string',
            'nationality' => 'required|string',
            'language' => 'array|required',
            'bio' => 'required|string',
        ]);

        UserForm::create([
            'first_name' => $validated['first_name'],
            'last_name' => $validated['last_name'],
            'gender' => $validated['gender'],
            'nationality' => $validated['nationality'],
            'languages' => implode(',', $validated['language']),
            'bio' => $validated['bio'],
        ]);

        $fullName = $validated['first_name'] . ' ' . $validated['last_name'];
        session(['full_name' => $fullName]);

        return redirect()->route('welcome')->with('success', 'Pendaftaran berhasil!');
    }

    public function showWelcome()
    {      
        return view('sapa');
    }
}
