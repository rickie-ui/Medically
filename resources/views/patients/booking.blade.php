@extends('layouts.base')

@section('content')

<section class=" flex space-x-4 m-10">

    <div class="w-11/12 mx-auto">

        <p class="text-lg my-1 font-semibold"><span class="text-[#40C68C]">Medically</span> <span class="opacity-50">/ Appointments</span></p>

        <div class="my-6 bg-white p-4 rounded-md">


            <h3 class="opacity-70 my-4 font-semibold">Appointment Overview</h3>
            
             <table class="display whitespace-nowrap" id="table1">
                  <thead>
                    <tr>
                      <th class="uppercase  text-xs opacity-50">Doctor Name</th>
                      <th class="uppercase  text-xs opacity-50">Email</th>
                      <th class="uppercase  text-xs opacity-50">Category</th>                  
                      <th class="uppercase  text-xs opacity-50">Status</th>                  
                    </tr>
                  </thead>
                  <tbody>
                    
                     @foreach ($doctors as $doctor)
                         
                   
                    <tr class="opacity-60 text-sm font-semibold">
                            <td>
                                <p>{{$doctor->fullName}}</p>                   
                            </td>

                            <td>
                                <p>{{$doctor->email}}</p>
                            </td>

                            <td>
                                <p>{{$doctor->category}}</p>
                            </td>
                            <td>
                                <a href="/booking/create/{{$doctor->id}}" class="bg-[#DBECF0] text-[#34BAA5] opacity-100 uppercase py-2 px-4 rounded-md text-xs hover:text-white hover:bg-[#34BAA5]"><i class="fa fa-plus-circle"></i>&ensp;Schedule</a>
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

