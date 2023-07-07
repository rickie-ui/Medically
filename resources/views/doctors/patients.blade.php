@extends('layouts.app')

@section('content')

<section class=" flex space-x-4 m-10">

    <div class="w-11/12 mx-auto">

        <p class="text-lg my-1 font-semibold"><span class="text-[#40C68C]">Medically</span> <span class="opacity-50">/ Patients</span></p>

        <div class="my-6 bg-white p-4 rounded-md">


            <h3 class="opacity-70 my-4 font-semibold">Patient Overview</h3>
            
             <table class="display whitespace-nowrap" id="table1">
                  <thead>
                    <tr>
                      <th class="uppercase  text-xs opacity-50">Patient ID</th>
                      <th class="uppercase  text-xs opacity-50">Patient Name</th>
                      <th class="uppercase  text-xs opacity-50">Phone</th>
                      <th class="uppercase  text-xs opacity-50">Age</th>                  
                      <th class="uppercase  text-xs opacity-50">Register Date</th>
                      <th class="uppercase  text-xs opacity-50 ">Status</th>
                    </tr>
                  </thead>
                  <tbody>

                    @foreach ($patients as $patient)
                        
                    <tr class="opacity-60 text-sm font-semibold">
                            <td>
                                <p>{{$patient->patientId}}</p>                   
                            </td>

                            <td>
                                <p>{{$patient->fullName}}</p>
                            </td>

                            <td>
                                <p>{{"+254".$patient->phone}}</p>
                            </td>

                            <td>
                                <p>{{$patient->age . ' yrs'}}</p>
                            </td>

                            <td>
                                <p>{{date_format(now()->parse($patient->created_at ?? ''), 'd-M-Y')}}</p>
                            </td>
                            
                            <td>
                                <a href="/patients/diagnosis/{{$patient->id}}" class="underline text-[#34BAA5]">View details</a>                   
                            </td>
                            </td>

                    </tr>

                    @endforeach
                               
                  </tbody>
                </table>


            <hr class="my-8">
        </div>

    </div>

</section>


@endsection
