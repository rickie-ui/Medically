@extends('layouts.base')

@section('content')

<section class=" flex space-x-4 m-10">



<div class="my-8 p-8 bg-white rounded-sm w-2/4 mx-auto">

    
     <p class="text-sm font-thin"><span class="text-[#40C68C]">Medically</span> <span class="opacity-50">/ Appointment</span></p>

        <h2 class="text-md my-4 font-semibold opacity-50 bg-[#DBECF0] py-2 px-2 text-center rounded-sm">Fill in the correct details about the appointment</h2>

        @if(session('status'))
                <div class="bg-[#DBECF0] p-2 rounded-lg text-center text-[#34BAA5] " id="duration">
                    {{ session('status')}}
                </div>
            @endif

         <form action="/booking/create/{{$doctor->id}}" method="POST">
                 
                @csrf

                 <div class=" flex space-x-4">
                        <div class="w-full">
                            <label for="fullName" class="block my-2">Doctor Name</label>
                            <input type="text" class="w-full border-2 px-4 py-2 rounded-md outline-none focus:bg-[#F3F8FB]" name="fullName" value="{{$doctor->fullName}}" disabled>
                        </div>
                       <div class="w-full">
                            <label for="category" class="block my-2">Category</label>
                            <input type="text" class="w-full border-2 px-4 py-2 rounded-md outline-none focus:bg-[#F3F8FB]" name="category" value="{{$doctor->category}}" disabled>
                        </div>
                </div>
                       
                <label for="when" class="block my-2">When</label>
                <input type="date" class="w-full border-2 px-4 py-2 rounded-md outline-none focus:bg-[#F3F8FB]  @error('when') border-2 border-red-500 @enderror" value="{{ old('when') }}" name="when" id="when">
                 @error('when')
                    <div class="text-red-500  text-sm">
                        {{ $message }}
                    </div>
                   @enderror
        
            
                <label for="at" class="block my-2">Time</label>
                <input type="time" class="w-full border-2 px-4 py-2 rounded-md outline-none focus:bg-[#F3F8FB]  @error('at') border-2 border-red-500 @enderror" value="{{ old('at') }}" name="at">
                 @error('at')
                    <div class="text-red-500  text-sm">
                        {{ $message }}
                    </div>
                   @enderror


                <button type="submit" class="bg-sky-500 text-white w-full font-semibold uppercase shadow-xl block mt-4 py-3 px-8 rounded-md text-sm hover:bg-sky-800">Book Now &ensp;<i class="fa fa-arrow-circle-right"></i></button>
 
        </form>  
     </div>

</section>


@endsection
