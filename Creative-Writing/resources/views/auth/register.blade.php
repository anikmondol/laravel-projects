<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Register || creative-writing</title>
    <link rel="shortcut icon" href="{{ asset('dashboard') }}/assets/images/neptune.png">


    @vite('resources/css/app.css')


    {{-- auth css file links --}}
    <link href="{{ asset('dashboard') }}/assets/css/auth.css" rel="stylesheet" type="text/css">


    <style>

    </style>
</head>
<body>
    <div class="relative flex flex-col justify-center overflow-hidden">
        <div class="p-6 m-auto rounded-md shadow-md form-container">
           <div class="flex items-center justify-center gap-2">
            <h1 class="text-xl font-black text-center text-gray-700">Creative-Writing</h1>
            <img src="{{ asset('dashboard') }}/assets/images/neptune.png" alt="">
           </div>
            <form action="{{ route('register') }}" method="POST" class="space-y-2">
                @csrf
                <div>
                    <label class="label">
                        <span class="text-sm label-text">Name</span>
                    </label>
                    <input name="name" type="text" placeholder="Name" class="text-sm  input input-bordered @error('name') is-invalid @enderror" value="{{ old('name') }}"/>
                    @error('name')
                    <span class="text-red-600">{{ $message }}</span>
                    @enderror
                </div>
                <div>
                    <label class="label">
                        <span class="text-sm label-text">Email</span>
                    </label>
                    <input name="email" type="text" placeholder="Email Address" class="text-sm  input input-bordered @error('email') is-invalid @enderror" value="{{ old('email') }}"/>
                    @error('email')
                    <span class="text-red-600">{{ $message }}</span>
                    @enderror
                </div>
                <div>
                    <label class="label">
                        <span class="text-sm label-text">Password</span>
                    </label>
                    <input name="password" type="password" placeholder="Enter Password" class="text-sm  input input-bordered @error('password') is-invalid @enderror" value="{{ old('password') }}"/>
                    @error('password')
                    <span class="text-red-600">{{ $message }}</span>
                    @enderror
                </div>
                <div class="">
                    <label class="label">
                        <span class="text-sm label-text">Confirm Password</span>
                    </label>
                    <input name="password_confirmation" type="password" placeholder="Confirm Password" class="text-sm  input input-bordered @error('password_confirmation') is-invalid @enderror" value="{{ old('password_confirmation') }}"/>
                </div>
                <div class="remember-me">
                    <input type="checkbox" id="remember-me-checkbox" />
                    <label class="form-check-label ms-2" for="checkbox-signin">I accept <a
                        href="#">Terms and Conditions</a></label>
                </div>
                <div>
                    <button type="submit" class="btn hover:duration-700 btn-block mt-4 text-white">Sign Up</button>
                </div>
            </form>
        </div>
        <div class="text-center mt-4">
            <span class="">Already have an account ?
                <a href="{{ route('login') }}" class=" text-blue-600 hover:text-blue-800 hover:underline">Log In</a></span>
        </div>
    </div>
</body>
</html>
