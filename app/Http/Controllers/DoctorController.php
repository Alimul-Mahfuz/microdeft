<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DoctorController extends Controller
{
    //
    function index(){
        return view ('doctor_crude');
    }
}
