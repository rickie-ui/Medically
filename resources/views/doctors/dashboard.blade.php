@extends('layouts.app')

@section('content')

<section class=" flex space-x-4 m-10">


    <div class="w-10/12">
        <header class="bg-white h-16 flex items-center justify-around space-x-4">
               <div class="w-min whitespace-nowrap h-full font-semibold opacity-70 p-4 flex space-x-2 items-center justify-center">
                    <div class="bg-[#FD686B] h-10 w-10 rounded-full text-white opacity-100 flex justify-center items-center"><i class="fa fa-user"></i></div>
                    <h3 class="opacity-70">Total Patients <br> <span>{{$patientCount}}</span></h3>
               </div>

               <div class="w-min whitespace-nowrap h-full font-semibold opacity-70 p-4 flex space-x-2 items-center justify-center">
                    <div class="bg-sky-500 h-10 w-10 rounded-full text-white opacity-100 flex justify-center items-center"><i class="fa fa-shield"></i></div>
                    <h3 class="opacity-70">Total Doctors <br> <span>{{$doctorCount}}</span></h3>
               </div>

                <div class=" w-min whitespace-nowrap h-full font-semibold opacity-70 p-4 flex space-x-2 items-center justify-center">
                    <div class="bg-[#4CA7A8] h-10 w-10 rounded-full text-white opacity-100 flex justify-center items-center"><i class="fa fa-tag"></i></div>
                    <h3 class="opacity-70">Total Appt. <br> <span>{{$doctorAppoint}}</span></h3>
               </div>

               <div class="w-min whitespace-nowrap h-full font-semibold opacity-70 p-4 flex space-x-2 items-center justify-center">
                    <div class="bg-[#F35385] h-10 w-10 rounded-full text-white opacity-100 flex justify-center items-center"><i class="fa fa-heartbeat"></i></div>
                    <h3 class="opacity-70">Upcoming Appt.  <br> <span>{{$upcomingCount}}</span></h3>
               </div>
        </header>

        <div class="my-6 bg-white p-4 rounded-md">

            <h3 class="opacity-70 my-4 font-semibold">Patient Overview</h3>
            
             <table class="display whitespace-nowrap" id="table1">
                  <thead>
                    <tr>
                      <th class="uppercase  text-xs opacity-50">Patient ID</th>
                      <th class="uppercase  text-xs opacity-50">Patient Name</th>
                      <th class="uppercase  text-xs opacity-50">Email</th>                  
                      <th class="uppercase  text-xs opacity-50">Age</th>
                      <th class="uppercase  text-xs opacity-50 ">Height</th>
                      <th class="uppercase  text-xs opacity-50 ">Weight</th>
                    </tr>
                  </thead>
                  <tbody>
                         
                    @foreach ($patients as $patient)
                        
                    
                    <tr class="opacity-60 text-sm font-semibold">
                       <td>
                        <p>{{$patient->patientId}}</p>                   
                      </td>

                       <td>
                        <p >{{$patient->fullName}}</p>
                      </td>

                      <td>
                         <p>{{$patient->email}}</p>
                      </td>
                      <td>
                         <p>{{$patient->age}}</p>
                      </td>
                      <td>
                         <p>{{$patient->height. ' cm'}}</p>
                      </td>
                      <td>
                         <p>{{$patient->weight. ' kg'}}</p>
                      </td>
                    </tr>

                    @endforeach
                               
                  </tbody>
                </table>


            <hr class="my-8">


           <h3 class="opacity-70 mb-4 mt-2 font-semibold">Appointments Overview</h3>
            
             <table class="display whitespace-nowrap" id="table2">
                  <thead>
                    <tr>
                      <th class="uppercase  text-xs opacity-50">Patient Name</th>
                      <th class="uppercase  text-xs opacity-50">Mobile</th>                  
                      <th class="uppercase  text-xs opacity-50">Email</th>                  
                      <th class="uppercase  text-xs opacity-50">Date</th>
                      <th class="uppercase  text-xs opacity-50 ">Time</th>
                      <th class="uppercase  text-xs opacity-50 ">Status</th>
                    </tr>
                  </thead>
                  <tbody>
                       
                     @foreach ($appoints as $appoint)
                          @if ($appoint->status == 1 || $appoint->status == 3)

                          <tr class="opacity-60 text-sm font-semibold">
                          <td>
                            <p>{{$appoint->fullName}}</p>                   
                          </td>

                          <td>
                            <p >{{"+254".$appoint->phone}}</p>
                          </td>

                          <td>
                            <p >{{$appoint->email}}</p>
                          </td>

                          <td>
                            <p>{{date_format(now()->parse($appoint->when), 'd M, Y' )}}</p>
                          </td>
                          <td>
                            <p>{{date_format(now('Africa/Nairobi')->parse($appoint->at), 'h:i A' )}}</p>
                          </td>
                          <td>
                             @if($appoint->status == 1)
                                   <p class="bg-[#CFDCFA]   text-center text-[#4CA7A8] rounded-md py-1">Accepted</p>
                              @elseif($appoint->status == 3)
                                   <p class="bg-[#CFDCFA]  text-center text-red-500 rounded-md py-1">Finished</p>
                             @endif
                          </td>
                        </tr>
                              
                          @endif
                    @endforeach
                               
                  </tbody>
                </table>
        </div>

    </div>

     <div class="w-3/12 bg-white">

        <div class="flex space-x-4 items-center justify-around py-2 opacity-70 bg-[#CFDCFA]">
            <i class="fa fa-bell-o"></i>
            <p>
                 {{$appointCount}} <br>
                 <span class="text-xs">Appointments</span>
            </p>

            <p class="text-sm"><i class="fa fa-caret-up text-[#4CA7A8]"></i> {{$doctorAppoint}} Finished <br>
                <i class="fa fa-caret-down text-red-500"></i> {{$upcomingCount}} Pending
            </p>
        </div>


        <h3 class="mx-4 mt-6 font-semibold opacity-80">Notifications&ensp;<span class="px-2 rounded-xl bg-[#FD686B] font-normal text-white">{{$totalPresc}}</span></h3>
         <h4 class="mx-4 mt-2 text-sm opacity-50">Latest prescriptions:</h4>
        <hr>

        @foreach ($prescriptions as $prescription)
            
        <div class="m-4">
          <div class="flex justify-between items-center my-2 flex-nowrap">
            <h3 class="h-8 w-8 rounded-full bg-[#4CA7A8] text-white font-bold flex justify-center items-center">{{mb_substr($prescription->fullName, 0, 1);}}</h3>
             <h3>{{$prescription->fullName}}</h3>
             <h3 class="opacity-50 text-sm">{{date_format(now()->parse($prescription->created_at), 'h:i A' )}}</h3>
          </div>

          <h3 class="my-1">{{$prescription->type}}</h3>


          <h4 class="my-1 text-sm opacity-50">Treatment:</h4>
       
          <p class="text-sm opacity-70 mb-2">{{$prescription->dosage}}</p>

          <div class="flex justify-between items-center">

            <a href="/patients/diagnosis/{{$prescription->patient_id}}" class="py-1 px-2 bg-[#4CA7A8] text-white text-sm rounded-md hover:opacity-70">View Details &#8594</a>

            <p class="opacity-50 text-sm">{{date_format(now()->parse($prescription->created_at), 'd M, Y' )}}</p>
          </div>

        </div>

        <hr>
        @endforeach

             {{$prescriptions->links()}}
    </div>


</section>


@endsection
