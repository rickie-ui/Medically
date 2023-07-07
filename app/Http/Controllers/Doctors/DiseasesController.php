<?php

namespace App\Http\Controllers\Doctors;

use App\Models\Disease;
use App\Models\Tracker;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class DiseasesController extends Controller
{
  // middleware and guard
    public function __construct(){
        $this->middleware('auth:doctor');
    }
    
     public function index(){

        // get users
         $infections = DB::table('diseases')
            ->latest()
            ->get();       
        ;

          $trackers = DB::table('trackers')
            ->leftJoin('diseases', 'diseases.id', '=', 'trackers.disease_id')
            ->select('diseases.id','diseases.strain','diseases.onset','diseases.origin','diseases.symptoms','diseases.treatment','trackers.tally','trackers.created_at', 'trackers.updated_at')
            ->latest()
            ->get();

            $total = $trackers->max('tally');
            $average = $trackers->avg('tally');
            $sum = $trackers->sum('tally');
            $diseaseCount = Disease::count();

            $final = $trackers->where('tally', $total);

         


        return view('doctors.diseases', ['infections' => $infections,
                'total' => $total,
                'final' => $final,
                'average' => $average,
                'sum' => $sum,
                'diseaseCount' => $diseaseCount    
    ]);
    }

     public function edit(){
        return view('doctors.create');
    }

     public function register($id){
          $result = Disease::get()->first(); 

          $info= $result->findOrFail($id);

        return view('doctors.infections', ['info'=> $info]);
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
            'strain' => 'required|alpha:ascii',
            'onset' => 'required|numeric',
            'origin' => 'required|alpha:ascii',
            'symptoms' => 'required',
            'treatment' => 'required|alpha:ascii',
        ]);

        $disease = Disease::Create($formFields);

        return redirect()->back()->with('status', 'The disease has been added successfully!');
    }


    
         //update disease details
    public function update(Request $request, $id)
    {
         $result = Disease::get()->first(); 

         $disease= $result->findOrFail($id);

         $request->validate([
            'tally' => 'required|numeric'
        ]);


        $disease->infection()->updateorCreate(
            [
            'disease_id' => $disease->id,
            ],
            
            [
            'tally' => $request->tally,
            ]
    );

        


        return redirect()->back()->with('status', 'Total infections updated successfully!');
        
    }
}
