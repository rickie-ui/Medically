@extends('layouts.app')

@section('content')

<section class=" flex space-x-4 m-10">

    <div class="w-11/12 mx-auto">

        <p class="text-lg my-1 font-semibold"><span class="text-[#40C68C]">Medically</span> <span class="opacity-50">/ Appointments</span></p>

        <div class="my-6 bg-white p-4 rounded-md">


            <h3 class="opacity-70 my-4 font-semibold"> Appointment Requests</h3>
            
             <table class="display whitespace-nowrap" id="table4">
                  <thead>
                    <tr>
                      <th class="uppercase  text-xs opacity-50">Patient Name</th>
                      <th class="uppercase  text-xs opacity-50">Phone</th>
                      <th class="uppercase  text-xs opacity-50">Email</th>
                      <th class="uppercase  text-xs opacity-50">Date</th>              
                      <th class="uppercase  text-xs opacity-50">Time</th>              
                      <th class="uppercase  text-xs opacity-50 ">Status</th>
                    </tr>
                  </thead>
                  <tbody>


                    @foreach ($appointments as $appointment)
                    
                      @if ($appointment->status == 0)

                      <tr class="opacity-60 text-sm font-semibold">
                            <td>
                                <p >{{$appointment->fullName}}</p>
                            </td>

                            <td>
                                <p >{{'+254'.$appointment->phone}}</p>
                            </td>

                            <td>
                                <p>{{$appointment->email}}</p>
                            </td>
                            <td>
                                 <p>{{date_format(now()->parse($appointment->when), 'd M, Y' )}}</p>
                            </td>

                            <td>
                                 <p>{{date_format(now('Africa/Nairobi')->parse($appointment->at), 'h:i A' )}} </p>
                            </td>
                            <td class="flex space-x-4">
                                <form action="/appointments/{{$appointment->id}}" method="POST">
                                  @csrf

                                  @method('PUT')

                                    <button type="submit" class="border border-[#34BAA5] text-[#34BAA5] py-1 px-3 rounded-md hover:bg-[#34BAA5] hover:text-white"><i class="fa fa-check"></i></button>
                           
                                </form>

                                <form action="/appointments/status/{{$appointment->id}}" method="POST">

                                  @csrf

                                  @method('PUT')

                                   <button type="submit" class="border border-red-300 text-red-400 py-1 px-3 rounded-md hover:bg-red-400 hover:text-white"><i class="fa fa-ban"></i></button>
                                </form>

                            </td>

                    </tr>

                    @elseif($appointment->status == 1)

                       <tr class="opacity-60 text-sm font-semibold">
                            <td>
                                <p >{{$appointment->fullName}}</p>
                            </td>

                            <td>
                                <p >{{'+254'.$appointment->phone}}</p>
                            </td>

                            <td>
                                <p>{{$appointment->email}}</p>
                            </td>
                            <td>
                                 <p>{{date_format(now()->parse($appointment->when), 'd M, Y' )}}</p>
                            </td>

                            <td>
                                 <p>{{date_format(now('Africa/Nairobi')->parse($appointment->at), 'h:i A' )}} </p>
                            </td>

                            <td>
                                <form action="/appointments/passed/{{$appointment->id}}" method="POST">

                                  @csrf

                                  @method('PUT')

                                   <button type="submit" class="border border-[#34BAA5] text-[#34BAA5] py-1 px-3 rounded-md hover:bg-[#34BAA5] hover:text-white"><i class="fa fa-check"> Finish</i></button>
                                </form>
                            </td>

                    </tr>

                          
                      @endif   
                    
                       @endforeach
                  </tbody>
                </table>

            <hr class="my-8">
        </div>

    </div>

</section>


@endsection
