@extends('layouts.app')

@section('content')

<section class=" flex space-x-4 m-10">

    

    <div class="w-11/12 mx-auto">

        <p class="text-lg my-1 font-semibold"><span class="text-[#40C68C]">Medically</span> <span class="opacity-50">/ Diseases</span></p>

        <div class="my-6 bg-white p-4 rounded-md">


            <div class=" flex justify-between items-center my-4">
                <h3 class="opacity-70 my-4 font-semibold">Virus and Disease Overview</h3>
                 <a href="{{route('create')}}" class="bg-[#DBECF0] text-[#34BAA5] py-2 px-4 rounded-md text-sm hover:text-white hover:bg-[#34BAA5]"><i class="fa fa-plus-circle"></i>&ensp; Add Disease</a>
            </div>
            
             <table class="display whitespace-nowrap" id="table1">
                  <thead>
                    <tr>
                        <th class="uppercase  text-xs opacity-50">Strain</th>
                        <th class="uppercase  text-xs opacity-50">Usual Onset</th>
                        <th class="uppercase  text-xs opacity-50">Origin</th>
                        <th class="uppercase  text-xs opacity-50">Symptoms</th>
                        <th class="uppercase  text-xs opacity-50">Treatment</th>                  
                        <th class="uppercase  text-xs opacity-50">Details</th>
                    </tr>
                  </thead>
                  <tbody>

                    @foreach($infections as $infection) 

                    <tr class="opacity-60 text-sm font-semibold">
                            
                            <td>
                                <p>{{$infection->strain}}</p>
                            </td>

                            <td>
                                <p >{{$infection->onset. " days"}}</p>
                            </td>

                            <td>
                                <p >{{$infection->origin}}</p>
                            </td>

                            <td>
                                <p>{{Str::limit($infection->symptoms, '25', '...')}}</p>
                            </td>
                            <td>
                                <p>{{$infection->treatment}}</p>
                            </td>

                            <td>
                                <a href="/diseases/{{$infection->id}}/update" class="text-red-400 py-2 px-4 rounded-md hover:underline"><i class="fa fa-plus-circle"></i> Infections</a>                   
                            </td>
                    </tr>
                    @endforeach
                               
                  </tbody>
                </table>


            <hr class="my-8">
        </div>

    </div>


     <div class="w-3/12 bg-white mt-14 rounded-md">

        <div class="flex space-x-4 items-center justify-around py-2 opacity-70 bg-[#CFDCFA]">
            <p>
                {{$diseaseCount}} <br>
                 <span class="text-xs">Disease Analytics </span>
            </p>

            <p class="text-sm"><i class="fa fa-caret-up text-[#4CA7A8]"></i> {{$sum}} Confirmed <br>
                <i class="fa fa-caret-down text-red-500"></i> {{round($average)}} Average Cases
        </span>
            </p>
        </div>


        <div class="mx-4 my-6 font-semibold opacity-80">Total Infections&ensp;<span class="px-2 rounded-xl bg-[#FD686B] font-normal text-white">{{$total}}</span>
        </div>
        

        <hr>

    

        <div class="m-4">
         
        @foreach ($final as $item)

        <div class="flex justify-between items-center my-2">
            @php
                $name = $item->strain
            @endphp
            <h3 class="h-8 w-8 rounded-full bg-[#4CA7A8] text-white font-bold flex justify-center items-center">{{mb_substr($name, 0, 1);}}</h3>
             <h3>{{$item->strain}}</h3>
             <h3 class="opacity-50 text-sm">{{date_format(now()->parse($item->created_at), 'd M, Y' )}}</h3>
          </div>

          <h3 class="my-1">Signs and Symptoms</h3>

          <p class="text-sm opacity-70 mb-2">{{$item->symptoms}}</p>

          <div class=" flex justify-between items-center text-sm my-2">
            <span class="opacity-50 font-semibold">{{ Carbon\Carbon::parse($item->updated_at)->diffForHumans()}} </span>
            <div class="text-[#4CA7A8] uppercase text-xs font-semibold hover:opacity-70">{{$item->strain}}</div>
          </div>
        

        </div>
            
        @endforeach
        
            
     
    </div>
</section>


@endsection
