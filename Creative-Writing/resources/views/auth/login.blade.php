<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Register || creative-writing</title>
    @vite('resources/css/app.css')

    <link rel="shortcut icon" href="{{ asset('dashboard') }}/assets/images/neptune.png">

    {{-- auth css file links --}}
    <link href="{{ asset('dashboard') }}/assets/css/auth.css" rel="stylesheet" type="text/css">


    <style>

    </style>
</head>

<body>
    <div class="relative flex flex-col justify-center overflow-hidden">
        <div class="p-6 m-auto rounded-md shadow-md form-container">
            <div class="flex items-center justify-center gap-2 pb-5">
                <h1 class="text-xl font-black text-center text-gray-700">Creative-Writing</h1>
                <img src="{{ asset('dashboard') }}/assets/images/neptune.png" alt="">
            </div>
            <form action="{{ route('login') }}" method="POST"class="space-y-2">
                @csrf
                <div>
                    <label class="label">
                        <span class="text-base label-text">Email</span>
                    </label>
                    <input name="email" type="text" placeholder="Email Address"
                        class="w-full input input-bordered" value="{{ old('emailv') }}"/>
                    @error('email')
                        <span class="text-red-600">{{ $message }}</span>
                    @enderror
                </div>
                <div>
                    <label class="label">
                        <span class="text-base label-text">Password</span>
                    </label>
                    <input name="password" type="password" placeholder="Enter Password"
                        class="w-full input input-bordered" value="{{ old('password') }}"/>
                    @error('email')
                        <span class="text-red-600">{{ $message }}</span>
                    @enderror
                </div>
                <div class="remember-me">
                    <input name="remember" type="checkbox" id="remember-me-checkbox" />
                    <label for="remember-me-checkbox">Remember me</label>
                </div>
                <div>
                    <button type="submit" class="btn hover:duration-700 btn-block text-white">Log In</button>
                </div>

            </form>
        </div>
        <div class="text-center mt-4">
            @if (Route::has('password.request'))
                <p class=""> <a href='{{ route('password.request') }}'>Forgot
                        your
                        password?</a></p>
            @endif
            <span>Don't have an account yet?
                <a href="javascript:void(0)"
                    class="text-blue-600 hover:text-blue-800 hover:underline">Sing Up</a></span>
        </div>
    </div>
</body>

</html>
