<?php

namespace App\Http\Controllers\Patients;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class SignoutController extends Controller
{
    
     // logout button
     public function signout(Request $request)
    {

          // auth()->logout();
          Auth::guard('patient')->logout();
          $request->session()->invalidate();
          $request->session()->regenerateToken();


        return redirect()->route('signin');
        
    
    }
}
