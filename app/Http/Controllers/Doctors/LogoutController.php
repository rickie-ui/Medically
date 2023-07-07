<?php

namespace App\Http\Controllers\Doctors;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class LogoutController extends Controller
{

  

     // logout button
     public function signout(Request $request)
    {


          Auth::guard('doctor')->logout();
          $request->session()->invalidate();
          $request->session()->regenerateToken();

        return redirect()->route('login');
        
    
    }
}
