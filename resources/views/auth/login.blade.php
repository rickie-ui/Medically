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
    <title>login</title>
</head>
<body class="antialiased bg-[#F3F8FB]">

    <section class=" shadow-lg rounded-md mx-auto px-4 py-4 my-10 w-2/6" >
            <h2 class="my-2 text-2xl">Welcome back!</h2>
            <p class="mb-4 opacity-50">Sign in using  the correct details to access the account.</p>

            @if(session('status'))
                <div class="bg-red-500 p-2 rounded-lg text-center text-white">
                    {{ session('status')}}
                </div>
            @endif

            <form action="{{route('login')}}" method="POST">

                @csrf

                <label for="email" class="block py-2">Email</label>
                <input type="text" name="email" placeholder="Enter email address" class=" w-full px-4 py-2 outline-none rounded-md @error('email') border-2 border-red-500 @enderror" value="{{ old('email') }}">
                @error('email')
                    <div class="text-red-500 text-sm">
                        {{ $message }}
                    </div>
                @enderror


                <label for="password" class="block py-2">Password</label>
                <input type="password" name="password" placeholder="Enter password" class=" w-full px-4 py-2 outline-none rounded-md @error('password') border-2 border-red-500 @enderror">
                 @error('password')
                    <div class="text-red-500 text-sm">
                        {{ $message }}
                    </div>
                @enderror


                <button type="submit" class="w-full bg-[#2CB39C] py-2 px-4 my-4 rounded-md text-white hover:opacity-70">
                    Sign In
                </button>

                <p class="text-center opacity-60">Don't have an account? <a href="{{route('register')}}" class="text-[#2CB39C]">Create account</a></p>
            </form>

           
    </section>

    
</body>
</html>