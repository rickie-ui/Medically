@extends('layouts.app')

@section('content')

<section class=" flex space-x-4 m-10">

    <div class="w-11/12 mx-auto">

        <p class="text-lg my-1 font-semibold"><span class="text-[#40C68C]">Medically</span> <span class="opacity-50">/ Residents</span></p>

        <div class="my-6 bg-white p-4 rounded-md">


            <h3 class="opacity-70 my-4 font-semibold">Doctors Overview</h3>
            
             <table class="display whitespace-nowrap" id="table1">
                  <thead>
                    <tr>
                      <th class="uppercase  text-xs opacity-50">Doctor ID</th>
                      <th class="uppercase  text-xs opacity-50">Doctor Name</th>
                      <th class="uppercase  text-xs opacity-50">Phone</th>
                      <th class="uppercase  text-xs opacity-50">Email</th>
                      <th class="uppercase  text-xs opacity-50">Category</th>                  
                    </tr>
                  </thead>
                  <tbody>
                    
                     @foreach($doctors as $doctor) 
                    <tr class="opacity-60 text-sm font-semibold">
                            <td>
                                <p>{{$doctor->doctorId}}</p>                   
                            </td>

                            <td>
                                <p>{{$doctor->fullName}}</p>
                            </td>

                            <td>
                                <p >{{"+254".$doctor->phone ?? 'N/A' }}</p>
                            </td>

                            <td>
                                <p >{{$doctor->email ?? 'N/A'}}</p>
                            </td>
                            <td>
                                <p>{{$doctor->category ?? 'N/A' }}</p>
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

