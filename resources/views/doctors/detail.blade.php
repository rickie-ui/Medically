@extends('layouts.app')

@section('content')

<section class=" flex space-x-4 m-10">

<div class="my-8 p-8 bg-white rounded-sm w-2/4 mx-auto">

        <h2 class="text-md my-4 font-semibold opacity-50 bg-[#DBECF0] py-2 px-2 text-center">Fill in the correct details about medicine prescription</h2>

        @if(session('status'))
                <div class="bg-[#DBECF0] p-2 rounded-lg text-center text-[#34BAA5] " id="duration">
                    {{ session('status')}}
                </div>
            @endif

         <form action="/patients/details/{{$patient->id}}" method="POST">
                 
                @csrf
                       
                <label for="type" class="block my-2">Type</label>
                <input type="text" class="w-full border-2 px-4 py-2 rounded-md outline-none focus:bg-[#F3F8FB]  @error('type') border-2 border-red-500 @enderror" value="{{ old('type') }}" name="type">
                 @error('type')
                    <div class="text-red-500  text-sm">
                        {{ $message }}
                    </div>
                   @enderror
        
            
                <label for="dosage" class="block my-2">Medication</label>
                <input type="text" class="w-full border-2 px-4 py-2 rounded-md outline-none focus:bg-[#F3F8FB]  @error('dosage') border-2 border-red-500 @enderror" value="{{ old('dosage') }}" name="dosage">
                 @error('dosage')
                    <div class="text-red-500  text-sm">
                        {{ $message }}
                    </div>
                   @enderror


                <label for="recommendation" class="block my-2">Recommendation</label>
                <input type="text" class="w-full border-2 px-4 py-2 rounded-md outline-none focus:bg-[#F3F8FB]  @error('recommendation') border-2 border-red-500 @enderror" value="{{ old('recommendation') }}" name="recommendation">
                 @error('recommendation')
                    <div class="text-red-500  text-sm">
                        {{ $message }}
                    </div>
                   @enderror



                <label for="notes" class="block my-2">Notes</label>
                  <textarea name="notes" id="editor">{{ old('notes') }}</textarea>
               @error('notes')
                    <div class="text-red-500  text-sm">
                        {{ $message }}
                    </div>
                   @enderror

                <button type="submit" class="bg-[#DBECF0] w-full text-[#34BAA5] font-semibold uppercase shadow-sm block mt-4 py-3 px-8 rounded-md text-sm hover:text-white hover:bg-[#34BAA5]">Add Prescription &ensp;<i class="fa fa-arrow-circle-right"></i></button>
 
        </form>  
     </div>

</section>


@endsection
