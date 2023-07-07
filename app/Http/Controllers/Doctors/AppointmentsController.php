<?php

namespace App\Http\Controllers\Doctors;

use App\Models\Appointment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class AppointmentsController extends Controller
{
    // middleware and guard
    public function __construct(){
        $this->middleware('auth:doctor');
    }

     public function index(){

         $appointments = DB::table('appointments')
            ->join('patients', 'patients.id', '=', 'appointments.patient_id')
            ->leftJoin('details', 'patients.id' , '=', 'details.patient_id')
            ->where('appointments.doctor_id', auth()->id())
            ->oldest('appointments.created_at')
            ->get();

            // dd($appointments);

        return view('doctors.appointment' , ['appointments' => $appointments]);
    }

    public function accept($id){
        
        $appoint = Appointment::where('patient_id', $id)->where('status', 0)->first();
        
        $appoint->status = 1;

        $appoint->update();

        return redirect()->route('dashboard');      

    }

    public function reject($id){

        $appoint = Appointment::where('patient_id', $id)->where('status', 0)->first();

        $appoint->status = 2;

        $appoint->update();

        return redirect()->route('dashboard');      

    }


     public function finish($id){

        $appoint = Appointment::where('patient_id', $id)->where('status', 1)->first();

        
        $appoint->status = 3;
        
        
        $appoint->update();
        
        // dd($appoint);
        return redirect()->route('dashboard'); 


    }
}
