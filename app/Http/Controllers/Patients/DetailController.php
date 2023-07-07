<?php

namespace App\Http\Controllers\Patients;

use App\Models\Patient;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DetailController extends Controller
{

     public function __construct(){
        $this->middleware('auth:patient');
    }

      public function index($id){

         $patient = Patient::where('id', $id)->first();

        return view('patients.detail', ['patient' => $patient]);
    }


     //update user details
    public function update(Request $request, $id)
    {

        $patient = Patient::where('id', $id)->first();
         

         $request->validate([
            'fullName' => 'required',
            'email' => ['required', 'email'],
            'phone' => 'required',
            'age' => 'required',
            'gender' => 'required',
            'blood_type' => 'required',
            'weight' => 'required',
            'height' => 'required',
        ]);


        $patient->update([
            'fullName' => $request->fullName,
            'email' => $request->email,
        ]);

        


       $patient->detail()->updateorCreate(
       
        [
            'patient_id' => $patient->id, 
        ],
        
        [
            'age' => $request->age,
            'blood_type' => $request->blood_type,
            'gender' => $request->gender,
            'phone' => $request->phone,
            'weight' => $request->weight,
            'height' => $request->height,
        ]);


        return redirect()->back()->with('status', 'Information updated successfully!');
        
    }
}
