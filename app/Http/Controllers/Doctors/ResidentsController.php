<?php

namespace App\Http\Controllers\Doctors;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class ResidentsController extends Controller
{
    // middleware and guard
    public function __construct(){
        $this->middleware('auth:doctor');
    }
    
    public function index(){

        $doctors = DB::table('doctors')
            ->join('profiles', 'doctors.id', '=', 'profiles.doctor_id')
            ->select('doctors.id','doctors.fullName','doctors.email','doctors.doctorId','profiles.phone','profiles.gender','profiles.created_at','profiles.category' )
            ->latest()
            ->get();

            // dd($doctors);

        return view('doctors.residents', ['doctors' => $doctors]);
    }
}
