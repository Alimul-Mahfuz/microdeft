<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class DoctorController extends Controller
{
    //
    function index():View
    {
        $doctors=Doctor::all();
        return view ('doctor_crude',compact('doctors'));
    }

    function store(Request $request):RedirectResponse
    {
        $this->validate($request,[
            'doctor_name'=>'required',
            'phone_number'=>'required',
            'appointment_fee'=>'required',
            'doctor_image'=>'mimes:jpg,png',
        ]);
        $doctor=new Doctor();
        $doctor->doctor_name=$request->doctor_name;
        $doctor->doctor_image=$request->doctor_image;
        $doctor->phone_number=$request->phone_number;
        $doctor->appointment_fee=$request->appointment_fee;
        $doctor->save();
        return redirect()->back()->with('msg','Data added successfully!!');
    }
    function update(Request $request):RedirectResponse
    {
        $this->validate($request,[
            'doctor_name'=>'required',
            'phone_number'=>'required',
            'appointment_fee'=>'required',
            'doctor_image'=>'mimes:jpg,png',
        ]);
        $doctor=Doctor::find($request->id);
        $doctor->doctor_name=$request->doctor_name;
        $doctor->doctor_image=$request->doctor_image;
        $doctor->phone_number=$request->phone_number;
        $doctor->appointment_fee=$request->appointment_fee;
        $doctor->save();
        return redirect()->back()->with('msg','Data added successfully!!');
    }

    function destroy($id):RedirectResponse
    {
        $doctor=Doctor::find($id);
        $doctor->delete();
        return redirect()->back()->with('msg','Data deleted successfully!!');
    }
}
