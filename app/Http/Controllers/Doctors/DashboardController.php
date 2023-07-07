<?php

namespace App\Http\Controllers\Doctors;

use App\Models\Doctor;
use App\Models\Patient;
use App\Models\Appointment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    // middleware and guard
    public function __construct(){
        $this->middleware('auth:doctor');
    }

    public function index(){

        //  $doctor = DB::table('doctors')
        //     ->get()
        //     ->first();

        $patients = DB::table('patients')
            ->leftJoin('details', 'patients.id', '=', 'details.patient_id')
            ->get();

        $appoints = DB::table('appointments')
            ->join('patients', 'patients.id', '=', 'appointments.patient_id')
            ->leftJoin('details', 'patients.id', '=', 'details.patient_id')
            ->where('doctor_id', auth()->id())    
            ->get();
             
            // getting upcoming appointments
            $apps = DB::table('appointments')
            ->where('doctor_id', auth()->id())
            ->where('status', 1)   
            ->get();

            // getting total  appointments for that doctor
            $totals = DB::table('appointments')
            ->where('doctor_id', auth()->id())
            ->where('status', 3)  
            ->get();


            // getting totals
            $patientCount = Patient::count();
            $doctorCount = Doctor::count();
            $appointCount = Appointment::count();
            $upcomingCount = $apps->count();
            $doctorAppoint = $totals->count();

            // getting prescriptions
            $prescriptions = DB::table('prescriptions')
            ->join('patients', 'patients.id', '=', 'prescriptions.patient_id')
            ->where('prescriptions.doctor_id', auth()->id())
            ->latest('prescriptions.created_at')
            ->paginate(2);

            // dd(auth()->id());


            $totalPresc = $prescriptions->count();    

        return view('doctors.dashboard' , ['patients' => $patients,
         'appoints' => $appoints,
         'patientCount' => $patientCount,
         'doctorCount' => $doctorCount,
         'doctorAppoint' => $doctorAppoint,
         'appointCount' => $appointCount,
         'upcomingCount' => $upcomingCount,
         'prescriptions' => $prescriptions,
         'totalPresc' => $totalPresc,
        ]);
    }
}
