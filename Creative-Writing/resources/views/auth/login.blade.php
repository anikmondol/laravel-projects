{{-- @extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Login') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection --}}


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
        <div class="p-6 m-auto rounded-md shadow-2xl form-container">
            <div class="flex items-center justify-center gap-2 pb-5">
                <h1 class="text-2xl font-semibold text-center text-gray-700">Creative-Writing</h1>
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
                    <input type="checkbox" id="remember-me-checkbox" />
                    <label for="remember-me-checkbox">Remember me</label>
                </div>
                <div>
                    <button type="submit" class="btn hover:duration-700 btn-block text-white">Register Account</button>
                </div>

            </form>
        </div>
        <div class="text-center mt-4">
            @if (Route::has('password.request'))
                <p class="text-[#F7F9F2]"> <a href='{{ route('password.request') }}'>Forgot
                        your
                        password?</a></p>
            @endif
            <span>Don't have an account yet?
                <a href="{{ route('register') }}"
                    class="text-blue-600 hover:text-blue-800 hover:underline">Register</a></span>
        </div>
    </div>
</body>

</html>
