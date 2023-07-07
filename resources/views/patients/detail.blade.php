@extends('layouts.base')

@section('content')

<section class="mx-10 h-screen">
      
     <div class="my-10 py-10 px-10 bg-white rounded-sm flex space-x-8">
     
        <div class="w-3/12 border-2  rounded-md text-center p-4">
            <img src="{{ asset('/images/avatar.jpg')}}" class="w-28 h-28 mx-auto rounded-full border-4 border-[#34BAA5] object-cover" alt="avatar">
            <h2 class="text-xl my-1 font-semibold">{{$patient->fullName}}</h2>
            <h3 class="text-sm opacity-60">{{$patient->email}}</h3>
            <hr class="my-4">
            <div class="flex space-x-4 justify-between text-justify px-2 opacity-50">
                <h2>Since:</h2>
                <h3>{{date_format(now()->parse($patient->created_at), 'd-m-Y' )}}</h3>
                
            </div>

            <hr class="my-4">

            <div class="flex space-x-4 justify-between px-2 opacity-50">
                <h2>Gender:</h2>
                <h3>{{$patient->detail->gender ?? ' '}}</h3>
            </div>

            <hr class="my-4">

            <div class="flex space-x-4 px-2  justify-between opacity-50">
                <h2>Mobile:</h2>
                <h3>{{$patient->detail->phone  ?? " "}}</h3>
            </div>

            <hr class="my-4">


        </div>

        <div class="w-9/12 border-2 rounded-md p-4">

            <h3 class="opacity-60  my-2">Account Settings</h3>

            @if(session('status'))
                <div class="bg-[#DBECF0] p-2 rounded-lg text-center text-[#34BAA5]" id="duration">
                    {{ session('status')}}
                </div>
            @endif
          <form action="/patient/{{$patient->id}}/profile" method="POST" >

                @csrf

                @method('PUT')

              <div class=" flex space-x-4">
                        <div class="w-full">
                            <label for="fullName" class="block my-2">Full Name</label>
                            <input type="text" class="w-full border-2 px-4 py-2 rounded-md outline-none focus:bg-[#F3F8FB]" name="fullName" value="{{$patient->fullName}}">
                             @error('fullName')
                                <div class="text-red-500 text-sm">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                       <div class="w-full">
                            <label for="email" class="block my-2">Email</label>
                            <input type="text" class="w-full border-2 px-4 py-2 rounded-md outline-none focus:bg-[#F3F8FB]" name="email" value="{{$patient->email}}">
                             @error('email')
                                <div class="text-red-500 text-sm">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                </div>

                <div class=" flex space-x-4">
                        <div class="w-full">
                            <label for="blood_type" class="block my-2">Blood Type</label>
                            <input type="text" class="w-full border-2 px-4 py-2 rounded-md outline-none focus:bg-[#F3F8FB]" name="blood_type" value="{{$patient->detail->blood_type ?? ''}}">
                             @error('blood_type')
                                <div class="text-red-500 text-sm">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="w-full">
                            <label for="phone" class="block my-2">Phone</label>
                            <input type="text" class="w-full border-2 px-4 py-2 rounded-md outline-none focus:bg-[#F3F8FB]" name="phone" value="{{$patient->detail->phone ?? ''}}">
                             @error('phone')
                                <div class="text-red-500 text-sm">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                </div>

                <div class=" flex space-x-4">
                    <div class="w-full">
                        <label for="gender" class="block my-2">Gender</label>
                        <input type="text" class="w-full border-2 px-4 py-2 rounded-md outline-none focus:bg-[#F3F8FB]" name="gender" value="{{$patient->detail->gender ?? ''}}">
                            @error('gender')
                            <div class="text-red-500 text-sm">
                                {{ $message }}
                            </div>
                        @enderror
                
                    </div>

                    <div class="w-full">
                        <label for="age" class="block my-2">Age</label>
                        <input type="text" class="w-full border-2 px-4 py-2 rounded-md outline-none focus:bg-[#F3F8FB]" name="age" value="{{$patient->detail->age ?? ''}}">
                            @error('age')
                            <div class="text-red-500 text-sm">
                                {{ $message }}
                            </div>
                        @enderror
                
                    </div>

                </div>


                  <div class=" flex space-x-4">
                    <div class="w-full">
                        <label for="weight" class="block my-2">Weight</label>
                        <input type="text" class="w-full border-2 px-4 py-2 rounded-md outline-none focus:bg-[#F3F8FB]" name="weight" value="{{$patient->detail->weight ?? ''}}">
                            @error('weight')
                            <div class="text-red-500 text-sm">
                                {{ $message }}
                            </div>
                        @enderror
                
                    </div>

                    <div class="w-full">
                        <label for="height" class="block my-2">Height</label>
                        <input type="text" class="w-full border-2 px-4 py-2 rounded-md outline-none focus:bg-[#F3F8FB]" name="height" value="{{$patient->detail->height ?? ''}}">
                            @error('height')
                            <div class="text-red-500 text-sm">
                                {{ $message }}
                            </div>
                        @enderror
                
                    </div>

                </div>

          
            <button type="submit" class="bg-[#DBECF0] text-[#34BAA5] font-semibold uppercase shadow-xl block my-4 py-3 px-8 rounded-md text-sm hover:text-white hover:bg-[#34BAA5]">Update &ensp;<i class="fa fa-arrow-circle-right"></i></button>
 
        </form>
        </div>
     </div>
    
 
    
</section>
    
@endsection