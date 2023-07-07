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
            ->get();


        return view('doctors.patients', ['patients' => $patients]);
    }
}
