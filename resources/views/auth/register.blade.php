<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
     {{-- including socials icons --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    {{-- including css using vite --}}
     @vite('resources/css/app.css')
    <title>register</title>
</head>
<body class="antialiased bg-[#F3F8FB]">

    <section class=" shadow-lg rounded-md mx-auto px-4 py-4 my-10 w-2/6" >
            <h2 class="my-2 text-2xl">Register Account</h2>
            <p class="mb-4 opacity-50">Create an account with correct details.</p>
            <form action="{{ route('register')}}" method="POST">

                @csrf
                
                <label for="fullName" class="block py-2">Name*</label>
                <input type="text" name="fullName" placeholder="Enter full name" class=" w-full px-4 py-2 outline-none rounded-md @error('fullName') border-2 border-red-500 @enderror" value="{{ old('fullName') }}">
                   @error('fullName')
                    <div class="text-red-500  text-sm">
                        {{ $message }}
                    </div>
                   @enderror

                <label for="email" class="block py-2">Email*</label>
                <input type="text" name="email" placeholder="Enter email address" class=" w-full px-4 py-2 outline-none rounded-md @error('email') border-2 border-red-500 @enderror" value="{{ old('email') }}">
                  @error('email')
                    <div class="text-red-500 text-sm">
                        {{ $message }}
                    </div>
                 @enderror


                <label for="password" class="block py-2">Password</label>
                <input type="password" name="password" placeholder="Enter password" class=" w-full px-4 py-2 outline-none rounded-md  @error('password') border-2 border-red-500 @enderror">
                @error('password')
                    <div class="text-red-500  text-sm">
                        {{ $message }}
                    </div>
                @enderror


                <label for="password_confirmation" class="block py-2">Repeat Password</label>
                <input type="password" name="password_confirmation" placeholder="Enter password again" class="w-full px-4 py-2 outline-none mb-2 rounded-md @error('password_confirmation') border-2 border-red-500 @enderror">
                 @error('password_confirmation')
                    <div class="text-red-500 text-sm">
                        {{ $message }}
                    </div>
                 @enderror

                <p class="my-4 opacity-50">By registering you agree to the our <a href="#" class="text-[#2CB39C]">Terms of Use</a></p>
                <button type="submit" class="w-full bg-[#2CB39C] py-2 px-4 rounded-md text-white hover:opacity-70">Create Account</button>

              <p class="my-8 text-center">Already have an account?<a href="{{route('login')}}" class="text-[#2CB39C]"> Login</a></p>
            </form>

           
    </section>

    
</body>
</html>