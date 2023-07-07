@extends('layouts.base')

@section('content')

  <section class="w-10/12 mx-auto my-8">

         <header class="bg-white h-16 flex items-center justify-around space-x-4 py-4">
               <div class="w-min whitespace-nowrap h-full font-semibold opacity-70 p-4 flex space-x-2 items-center justify-center border-r-2">
                    <div class="bg-[#FD686B] h-10 w-10 rounded-full text-white opacity-100 flex justify-center items-center"><i class="fa fa-user"></i></div>
                    <h3 class="opacity-70"><span class="text-xs uppercase"><i class="fa fa-info-circle text-sky-500 text-sm"></i> Patient Info</span> <br> <span>{{$patient->fullName}}</span>
                    </h3>
               </div>

               <div class="w-min whitespace-nowrap h-full font-semibold opacity-70 p-4 flex space-x-2 items-center justify-center border-r-2">          
                    <h3 class="opacity-70"><span class="text-xs uppercase"><i class="fa fa-filter text-orange-300"></i> Diagnosis</span> <br> <span>{{$prescribe->type ?? 'N/A'}}</span></h3>
               </div>

                <div class=" w-min whitespace-nowrap h-full font-semibold opacity-70 p-4 flex space-x-2 items-center justify-center border-r-2">
                    <h3 class="opacity-70"><span class="text-xs uppercase"><i class="fa fa-address-book text-purple-600"></i> Last Visit</span>  <br> <span>{{date_format(now()->parse($prescribe->created_at ?? ''), 'd.m.Y')}}</span></h3>
               </div>

               <div class="w-min whitespace-nowrap h-full font-semibold opacity-70 p-4 flex space-x-2 items-center justify-center">
                    <h3 class="opacity-70"><span class="text-xs uppercase"><i class="fa fa-check-circle text-sm text-[#4CA7A8]"></i> Recommendation</span>   <br> <span>{{$prescribe->recommendation ?? 'N/A'}}</span></h3>
               </div>
        </header>



        <div class="my-6 bg-white p-4 rounded-md">

            <div class=" flex justify-between items-center my-4">
                <h3 class="opacity-70 my-4 font-semibold">Illness History</h3>
                 <a href="{{route('booking')}}" class="bg-[#DBECF0] text-[#34BAA5] uppercase py-2 px-4 rounded-md text-xs hover:text-white hover:bg-[#34BAA5]"><i class="fa fa-plus-circle"></i>&ensp; Book Appointment</a>
            </div>
            
             <table class="display whitespace-nowrap" id="table1">
                  <thead>
                    <tr>
                      <th class="uppercase  text-xs opacity-50">Type</th>
                      <th class="uppercase  text-xs opacity-50">Date</th>
                      <th class="uppercase  text-xs opacity-50">Medication</th>
                      <th class="uppercase  text-xs opacity-50">Doctor Name</th>
                    </tr>
                  </thead>
                  <tbody>
                         
                        @foreach ($prescriptions as $prescription)
                        
                        <tr class="opacity-60 text-sm font-semibold">

                                <td>
                                    <p >{{$prescription->type}} </p>
                                </td>

                                <td>
                                    <p >{{date_format(now()->parse($prescription->created_at), 'd M Y')}}</p>
                                </td>

                                <td>
                                    <p>{{$prescription->dosage}}</p>
                                </td>
                                <td>
                                    <p>{{$prescription->fullName}}</p>

                                </td>
                        </tr>

                    @endforeach

                  </tbody>
                </table>


            <hr class="my-8">
        </div>
  </section>


@endsection
