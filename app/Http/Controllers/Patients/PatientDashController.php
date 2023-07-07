<?php

namespace App\Http\Controllers\Patients;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class PatientDashController extends Controller
{
     public function __construct(){
        $this->middleware('auth:patient');
    }

    public function index(){

         $prescribe = DB::table('patients')
            ->join('prescriptions', 'patients.id', '=', 'prescriptions.patient_id')
            ->where('patients.id', auth()->id())
            ->latest('prescriptions.created_at')
            ->get()
            ->first();


         // get the patient info
        $patient = DB::table('patients')
            ->leftJoin('details', 'patients.id', '=', 'details.patient_id')
            ->where('patients.id', auth()->id())
            ->get()
            ->first();

            
         $prescriptions = DB::table('prescriptions')
            ->join('doctors', 'doctors.id', '=', 'prescriptions.doctor_id')
            ->where('prescriptions.patient_id', auth()->id())
            ->get();

           

        return view('patients.patientdash', [
            'prescribe' => $prescribe, 
            'patient' => $patient,
            'prescriptions' => $prescriptions,
        ]);
    }

    public function appoint(){

         $appoints = DB::table('appointments')
            ->join('doctors', 'doctors.id', '=', 'appointments.doctor_id')
            ->leftJoin('profiles', 'doctors.id', '=', 'profiles.doctor_id')
            ->latest('appointments.created_at')
            ->where('appointments.patient_id', auth()->id())
            ->get();



        return view('patients.appoint', ['appoints' => $appoints]);
    }
}
