<?php

namespace App\Http\Controllers\Patients;

use App\Models\Doctor;
use App\Models\Patient;
use App\Models\Appointment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class BookingController extends Controller
{
    public function __construct(){
        $this->middleware('auth:patient');
    }


     public function index(){
        $doctors = DB::table('doctors')
            ->leftJoin('profiles', 'doctors.id', '=', 'profiles.doctor_id')
            ->get();

        return view('patients.booking', ['doctors' => $doctors]);
    }


    public function edit($id){

        // get the doctor info
         $doctor = DB::table('doctors')
            ->leftJoin('profiles', 'doctors.id', '=', 'profiles.doctor_id')
            ->where('doctors.id', $id)
            ->get()
            ->first();
        

        return view('patients.schedule', ['doctor'=>$doctor]);
    }


      //update user details
    public function store(Request $request, $id)
    {    
        // get the doctor info
        $doctor = Doctor::where('id', $id)->first();



        // get the patient info
        $patient = DB::table('patients')
            ->where('patients.id', auth()->id())
            ->get()
            ->first();
            
           // validating request
          $formFields = $request->validate([
            'when' => 'required',
            'at' => 'required',
        ]);

        
        $formFields['patient_id'] = $patient->id;
        $formFields['doctor_id'] = $doctor->id;
        $formFields['status'] = 0;


        Appointment::Create($formFields);

        return redirect()->back()->with('status', 'Appointment booked successfully!');
        
    }
}
