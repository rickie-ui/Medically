@extends('layouts.app')

@section('content')

<section class=" flex space-x-4 m-10">

<div class="my-8 p-8 bg-white rounded-sm w-2/4 mx-auto">

        <h2 class="text-md my-4 font-semibold opacity-50 bg-[#DBECF0] py-2 px-2 text-center">Fill in the correct details about the disease or virus</h2>

        @if(session('status'))
                <div class="bg-[#DBECF0] p-2 rounded-lg text-center text-[#34BAA5] " id="duration">
                    {{ session('status')}}
                </div>
            @endif

         <form action="{{ route('create')}}" method="POST">
                 
                @csrf
                       
                <label for="strain" class="block my-2">Strain*</label>
                <input type="text" class="w-full border-2 px-4 py-2 rounded-md outline-none focus:bg-[#F3F8FB]  @error('strain') border-2 border-red-500 @enderror" value="{{ old('strain') }}" name="strain">
                 @error('strain')
                    <div class="text-red-500  text-sm">
                        {{ $message }}
                    </div>
                   @enderror
        
            
                <label for="onset" class="block my-2">Usual Onset*</label>
                <input type="text" class="w-full border-2 px-4 py-2 rounded-md outline-none focus:bg-[#F3F8FB]  @error('onset') border-2 border-red-500 @enderror" value="{{ old('onset') }}" name="onset">
                 @error('onset')
                    <div class="text-red-500  text-sm">
                        {{ $message }}
                    </div>
                   @enderror

                <label for="origin" class="block my-2">Origin*</label>
                <input type="text" class="w-full border-2 px-4 py-2 rounded-md outline-none focus:bg-[#F3F8FB]  @error('origin') border-2 border-red-500 @enderror" value="{{ old('origin') }}" name="origin">
                 @error('origin')
                    <div class="text-red-500  text-sm">
                        {{ $message }}
                    </div>
                   @enderror

                <label for="symptoms" class="block my-2">Symptoms*</label>
                <textarea rows="4" class="w-full border-2 px-4 py-2 rounded-md outline-none focus:bg-[#F3F8FB]  @error('symptoms') border-2 border-red-500 @enderror" value="{{ old('symptoms') }}" name="symptoms"></textarea>
                 @error('symptoms')
                    <div class="text-red-500  text-sm">
                        {{ $message }}
                    </div>
                   @enderror

                <label for="treatment" class="block my-2">Treatment*</label>
                <input type="text" class="w-full border-2 px-4 py-2 rounded-md outline-none focus:bg-[#F3F8FB]  @error('treatment') border-2 border-red-500 @enderror" value="{{ old('treatment') }}" name="treatment">
                 @error('treatment')
                    <div class="text-red-500  text-sm">
                        {{ $message }}
                    </div>
                   @enderror

                <button type="submit" class="bg-[#DBECF0] text-[#34BAA5] font-semibold uppercase shadow-xl block mt-4 py-3 px-8 rounded-md text-sm hover:text-white hover:bg-[#34BAA5]">Add Disease &ensp;<i class="fa fa-arrow-circle-right"></i></button>
 
        </form>  
     </div>

</section>


@endsection
