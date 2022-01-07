<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FormController extends Controller
{
    public function index()
    {
        return view('MultiStepForm.multi-step-form');
    }

    public function formSubmit(Request $request)
    {
        return $request->all();
    }
}
