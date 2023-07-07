@extends('layouts.base')

@section('content')

<section class=" flex space-x-4 m-10">

    <div class="w-11/12 mx-auto">

        <p class="text-lg my-1 font-semibold"><span class="text-[#40C68C]">Medically</span> <span class="opacity-50">/ Appointments</span></p>

        <div class="my-6 bg-white p-4 rounded-md">


            <h3 class="opacity-70 my-4 font-semibold">Appointments Overview</h3>
            
             <table class="display whitespace-nowrap" id="table1">
                  <thead>
                    <tr>
                      <th class="uppercase  text-xs opacity-50">Doctor Name</th>
                      <th class="uppercase  text-xs opacity-50">Category</th>
                      <th class="uppercase  text-xs opacity-50">Date</th>                  
                      <th class="uppercase  text-xs opacity-50">Time</th>                  
                      <th class="uppercase  text-xs opacity-50">Status</th>                  
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
                                            <p>{{$appoint->category}}</p>
                                        </td>

                                        <td>
                                            <p>{{date_format(now()->parse($appoint->when), 'd M, Y' )}}</p>
                                        </td>

                                        <td>
                                            <p>{{date_format(now('Africa/Nairobi')->parse($appoint->at), 'h:i A' )}} </p>
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


            <hr class="my-8">
        </div>

    </div>

</section>


@endsection

