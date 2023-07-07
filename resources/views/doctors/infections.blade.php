@extends('layouts.app')

@section('content')

<section class="mx-10 h-screen">
    
      
     <div class="my-10 py-10 px-10 bg-white rounded-sm flex space-x-8">
     
        <div class="w-3/12 border-2  rounded-md text-center p-4">
           <h3 class="text-xl">Disease Information</h3>
            <p class="text-sm my-1"><span class="text-[#405189]">Disease</span> <span class="opacity-50">/ Statistics</span></p>
            <hr class="my-4">
            <div class="flex space-x-4 justify-between text-justify px-2 opacity-50">
                <h2>Since:</h2>
                <h3>{{date_format(now()->parse($info->created_at), 'd-m-Y' )}}</h3>          
            </div>

            <hr class="my-4">

            <div class="flex space-x-4 justify-between px-2 opacity-50">
                <h2>Location:</h2>
                <h3>{{$info->origin}}</h3>
            </div>

            <hr class="my-4">

            <div class="flex space-x-4 px-2  justify-between opacity-50">
                <h2>Incubation:</h2>
                <h3>{{$info->onset. " days"}}</h3>
            </div>

            <hr class="my-4">


        </div>

        <div class="w-9/12 border-2 rounded-md p-4">

            <h3 class="opacity-60  my-2">Update Infection details</h3>

          <form action="/diseases/{{$info->id}}/update" method="POST" >

                @csrf

                @method('PUT')

              <div class=" flex space-x-4">
                        <div class="w-full">
                            <label for="strain" class="block my-2">Strain</label>
                            <input type="text" class="w-full border-2 px-4 py-2 rounded-md outline-none focus:bg-[#F3F8FB]" name="strain" value="{{$info->strain}}" disabled>
                             @error('strain')
                                <div class="text-red-500 text-sm">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="w-full">
                            <label for="onset" class="block my-2">Incubation</label>
                            <input type="text" class="w-full border-2 px-4 py-2 rounded-md outline-none focus:bg-[#F3F8FB]" name="onset" value="{{$info->onset}}" disabled>
                             @error('onset')
                                <div class="text-red-500 text-sm">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                </div>

                <div class=" flex space-x-4">
                        <div class="w-full">
                            <label for="origin" class="block my-2">Origin</label>
                            <input type="text" class="w-full border-2 px-4 py-2 rounded-md outline-none focus:bg-[#F3F8FB]" name="origin" value="{{$info->origin}}" disabled>
                             @error('origin')
                                <div class="text-red-500 text-sm">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="w-full">
                            <label for="treatment" class="block my-2">Treatment</label>
                            <input type="text" class="w-full border-2 px-4 py-2 rounded-md outline-none focus:bg-[#F3F8FB]" name="treatment" value="{{$info->treatment}}" disabled>
                             @error('treatment')
                                <div class="text-red-500 text-sm">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                </div>

                    <h3 class="opacity-60  my-5">Infection rate</h3>

                 @if(session('status'))
                    <div class="bg-[#DBECF0] p-2 rounded-lg text-center text-[#34BAA5]" id="duration">
                        {{ session('status')}}
                    </div>
                 @endif

                 <div class="w-full">
                            <label for="tally" class="block my-2">Total Infections</label>
                            <input type="text" class="w-full border-2 px-4 py-2 rounded-md outline-none focus:bg-[#F3F8FB]" name="tally" value="{{$info->infection->tally ?? ''}}">
                                @error('tally')
                                    <div class="text-red-500  text-sm">
                                        {{ $message }}
                                    </div>
                                @enderror
                    </div>

            
          
            <button type="submit" class="bg-[#DBECF0] text-[#34BAA5] font-semibold uppercase shadow-xl block my-4 py-3 px-8 rounded-md text-sm hover:text-white hover:bg-[#34BAA5]">Update &ensp;<i class="fa fa-arrow-circle-right"></i></button>
 
        </form>
        </div>
     </div>
    
 
    
</section>
    
@endsection