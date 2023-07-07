<?php

namespace App\Http\Controllers\Doctors;

use App\Models\Doctor;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProfileController extends Controller
{
    // middleware and guard
    public function __construct(){
        $this->middleware('auth:doctor');
    }

    
    public function index($id){

         $result = Doctor::get()->first(); 

         $doctor= $result->find($id);

        return view('doctors.profile', ['doctor' => $doctor]);
    }


     //update user details
    public function update(Request $request, $id)
    {
         $result = Doctor::get()->first(); 

         $doctor= $result->find($id);

         $request->validate([
            'fullName' => ['required'],
            'email' => ['required', 'email'],
            'phone' => 'required|numeric',
            'category' => ['required'],
            'gender' => ['required'],
        ]);


        $doctor->update([
            'fullName' => $request->fullName,
            'email' => $request->email,
        ]);

        


       $doctor->profile()->updateorCreate(
        [
            'doctor_id' => $doctor->id, 
        ],
        
        [
            'category' => $request->category,
            'gender' => $request->gender,
            'phone' => $request->phone,
        ]);


        return redirect()->back()->with('status', 'Information updated successfully!');
        
    }
}

