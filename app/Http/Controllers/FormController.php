<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;

class FormController extends Controller
{
    public function myForm()
    {
        return view('form');
    }

    public function myFormPost(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'first_name' => 'required',
            'last_name' => 'required',
            'username' => 'required',
            'gender' => 'required',
            'birth' => 'required',
        ]);
    }
}
