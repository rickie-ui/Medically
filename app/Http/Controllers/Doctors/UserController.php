<?php

namespace App\Http\Controllers\Doctors;

use App\Models\Doctor;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function __construct(){
        $this->middleware('guest:doctor');
    }
    
    // get the registration form
    public function index(){
        return view('auth.register');
    }
 
    // get the login form
    public function login(){
        return view('auth.login');
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
            'email' => ['required', 'email:strict,dns', Rule::unique('doctors', 'email')],
            'password' => 'required|confirmed|min:8'
        ]);

        //Hash password
        $formFields['password'] = bcrypt($formFields['password']);
       
         $doctorId = '#'. + rand(1000, 9999);

         $formFields['doctorId'] =   $doctorId;

        $admin = Doctor::Create($formFields);

        Auth::guard('doctor')->attempt($request->only('email','password'));

        return redirect()->route('dashboard');
    }

     /**
     * Login using existing data in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function signin(Request $request)
    {
        $this->validate($request,[
                'email' => 'required|email',
                'password' => 'required'
              ]);

             if (!Auth::guard('doctor')->attempt($request->only('email','password'))) {
              return back()->with('status', 'Invalid credentials');
             }

              return redirect()->route('dashboard');;
    }

}