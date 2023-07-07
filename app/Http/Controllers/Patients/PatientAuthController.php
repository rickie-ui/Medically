<?php

namespace App\Http\Controllers\Patients;

use App\Models\Patient;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class PatientAuthController extends Controller
{
    public function __construct(){
        $this->middleware('guest:patient');
    }
    
    // get the registration form
    public function index(){
        return view('patients.signup');
    }

    // get the login form
    public function login(){
        return view('patients.signin');
    }
    
       /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // validating request
          $formFields = $request->validate([
            'fullName' => 'required|max:255',
            'email' => ['required', 'email:strict,dns', Rule::unique('patients', 'email')],
            'password' => 'required|confirmed|min:8'
        ]);

        //Hash password
        $formFields['password'] = bcrypt($formFields['password']);
       
         $patientId = '#'. + rand(1000, 9999);

         $formFields['patientId'] =   $patientId;

        $patient = Patient::Create($formFields);

        Auth::guard('patient')->attempt($request->only('email','password'));

        return redirect()->route('patientdash');
    }

     /**
     * Login using existing data in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function signin(Request $request)
    {

        // dd(bcrypt(12345678));
        $this->validate($request,[
                'email' => 'required|email',
                'password' => 'required'
              ]);

             if (!Auth::guard('patient')->attempt($request->only('email','password'))) {
              return back()->with('status', 'Invalid credentials');
             }

              return redirect()->route('patientdash');;
    }

}