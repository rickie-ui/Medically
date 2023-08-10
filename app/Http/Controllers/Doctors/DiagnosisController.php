<?php

namespace App\Http\Controllers\Doctors;

use App\Models\Patient;
use App\Models\Prescription;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class DiagnosisController extends Controller
{
    // middleware and guard
    public function __construct(){
        $this->middleware('auth:doctor');
    }

     public function index($id){

        $prescribe = DB::table('patients')
            ->join('prescriptions', 'patients.id', '=', 'prescriptions.patient_id')
            ->where('patients.id', $id)
            ->latest('prescriptions.created_at')
            ->get()
            ->first();

            // dd($prescribe);

         // get the patient info
        $patient = DB::table('patients')
            ->leftJoin('details', 'patients.id', '=', 'details.patient_id')
            ->where('patients.id', $id)
            ->select('patients.id', 'patients.email', 'patients.fullName', 'patients.patientId', 'patients.created_at', 'details.phone', 'details.gender', 'details.age', 'details.blood_type', 'details.weight', 'details.height')
            ->get()
            ->first();



            
         $prescriptions = DB::table('prescriptions')
            ->join('doctors', 'doctors.id', '=', 'prescriptions.doctor_id')
            ->where('prescriptions.patient_id', $id)
            ->select('doctors.id','doctors.fullName', 'doctors.email', 'prescriptions.patient_id', 'prescriptions.type', 'prescriptions.dosage', 'prescriptions.notes','prescriptions.recommendation', 'prescriptions.created_at')
            ->get();
          
        
        
        
        return view('doctors.diagnosis',
         [
            'prescribe' => $prescribe, 
            'patient' => $patient,
            'prescriptions' => $prescriptions,
        ]);
    }

    public function edit($id){
        $patient = Patient::where('id', $id)->first();
        return view('doctors.detail', ['patient' => $patient]);
    }

       //update user details
    public function store(Request $request, $id)
    {    
        // // get the doctor info
        // $doctor = DB::table('doctors')
        //     ->get()
        //     ->first();
        // get the appointment info
        $appoint = DB::table('appointments')
            ->get()
            ->first();
            
           // validating request
          $formFields = $request->validate([
            'type' => 'required',
            'dosage' => 'required',
            'notes' => 'required',
            'recommendation' => 'required',
        ]);

        
        $formFields['patient_id'] = $id;
        $formFields['doctor_id'] = auth()->id();
        $formFields['appointment_id'] = $appoint->id;


        Prescription::Create($formFields);

        return redirect()->back()->with('status', 'Prescription added successfully!');
        
    }
}
