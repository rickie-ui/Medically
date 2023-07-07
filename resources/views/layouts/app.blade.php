<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Index</title>

      {{-- including  icons --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

      {{-- JQuery --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>

     {{-- editor --}}
    <script defer src="https://cdn.ckeditor.com/ckeditor5/36.0.1/classic/ckeditor.js"></script>


     {{-- Data tables --}}
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.21/js/jquery.dataTables.min.js"></script>

      {{-- custom js --}}
    <script defer src="{{asset('custom.js')}}"></script>

     {{-- including css using vite --}}
     @vite('resources/css/app.css')
     
</head>
<body class="antialiased bg-[#F5F5FD] max-lg:hidden">
  
    <section class="flex min-h-screen">
    <aside class="bg-white w-2/12 h-auto border-0 border-r-2">
      <h3 class="text-3xl text-center my-4 font-bold text-[#40C68C]">Medically</h3>

      <div class="bg-[#ECFDF9] px-2 py-2 h-20  flex  space-x-4 items-center">
        <img src="{{ asset('/images/avatar.jpg')}}" alt="avatar" class="h-14 w-14 rounded-full border-4 border-[#40C68C]">
        <h3 class="text-md opacity-50 font-semibold"> <a href="/doctor/{{Auth::guard('doctor')->user()->id}}/profile" class="hover:underline">{{Auth::guard('doctor')->user()->fullName  ?? ''}}</a><br><span class="text-xs">{{Auth::guard('doctor')->user()->email ?? ''}}</span></h3>

      </div>

      <h3 class="mx-4 text-[#40C68C] opacity-70 uppercase font-semibold  mt-4 mb-3 text-xs">menu</h3>

      <ul class="opacity-70">
        <li class="text-md duration-300 hover:text-white hover:bg-[#40C68C] hover:rounded-sm">
          <a href="{{route('dashboard')}}" class="block px-4 py-2 {{ request()->segment(1) == 'dashboard' ? 'bg-[#40C68C] text-white' : '' }}"><i class="fa fa-dashboard"></i>&ensp; Dashboard</a>
        </li>

       <li class="text-md duration-300 hover:text-white hover:bg-[#40C68C] hover:rounded-sm">
          <a href="{{route('patient')}}" class="block px-4 py-2 {{ request()->segment(1) == 'patients' ? 'bg-[#40C68C] text-white' : '' }}"><i class="fa fa-user"></i>&ensp; Patients</a>
        </li>

        <li class="text-md duration-300 hover:text-white hover:bg-[#40C68C] hover:rounded-sm">
          <a href="{{route('resident')}}" class="block px-4 py-2 {{ request()->segment(1) == 'doctors' ? 'bg-[#40C68C] text-white' : '' }}"><i class="fa fa-shield"></i>&ensp; Doctors</a>
        </li>

        <li class="text-md duration-300 hover:text-white hover:bg-[#40C68C] hover:rounded-sm">
          <a href="{{route('disease')}}" class="block px-4 py-2 {{ request()->segment(1) == 'diseases' ? 'bg-[#40C68C] text-white' : '' }}"><i class="fa fa-list-alt"></i>&ensp; Diseases</a>
        </li>

           <li class="text-md duration-300 hover:text-white hover:bg-[#40C68C] hover:rounded-sm">
          <a href="{{route('appointment')}}" class="block px-4 py-2 {{ request()->segment(1) == 'appointments' ? 'bg-[#40C68C] text-white' : '' }}"><i class="fa fa-briefcase"></i>&ensp; Appointments</a>
        </li>
    
         <li class="text-md my-2 hover:text-red-500">

          <form action="{{ route('logout') }}" method="POST">

                 @csrf

                 <button type="submit" class="px-4 py-2">
                  <i class="fa fa-sign-out"></i>&ensp; Sign Out
                </button>
             </form>
        </li>
      </ul>
    </aside>

<main class="w-10/12 h-auto">
  
        <section class="mt-8">

            @php date_default_timezone_set("Africa/Nairobi"); @endphp

            <div class="px-10 font-semibold">
                <h3 class="text-xl">Dashboard Today</h3>
                <p class="text-xs my-1 opacity-40  capitalize">Overview&ensp;{{ now()->format('d F Y') }}</p>
            </div>

            @yield('content')

        </section>

    </main>
</section>

    
</body>
</html>