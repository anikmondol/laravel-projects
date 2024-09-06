{{-- @extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

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
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
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
           <div class="flex items-center justify-center gap-2">
            <h1 class="text-2xl font-semibold text-center text-gray-700">Creative-Writing</h1>
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
                    <input name="password_confirmation" type="password" placeholder="Confirm Password" class="text-sm  input input-bordered @error('password_confirmation') is-invalid @enderror"/>
                    @error('password_confirmation')
                    <span class="text-red-600">{{ $message }}</span>
                    @enderror
                </div>
                <div>
                    <button type="submit" class="btn hover:duration-700 btn-block mt-4 text-white">Register Account</button>
                </div>
            </form>
        </div>
        <div class="text-center mt-4">
            <span class="">Already have an account ?
                <a href="{{ route('login') }}" class=" text-blue-600 hover:text-blue-800 hover:underline">Login</a></span>
        </div>
    </div>
</body>
</html>
