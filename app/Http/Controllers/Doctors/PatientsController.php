<?php

namespace App\Http\Controllers\Doctors;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class PatientsController extends Controller
{
    // middleware and guard
    public function __construct(){
        $this->middleware('auth:doctor');
    }
    
    public function index(){

        $patients = DB::table('patients')
            ->leftJoin('details', 'patients.id', '=', 'details.patient_id')
            ->select('patients.id', 'patients.email', 'patients.fullName', 'patients.patientId', 'patients.created_at', 'details.phone', 'details.gender', 'details.age', 'details.blood_type', 'details.weight', 'details.height')
            ->get();

        //    dd($patients->created_at);




        return view('doctors.patients', ['patients' => $patients]);
    }
}
