@extends('layouts.dashboardmaster')

@section('title')

Profile

@endsection



@section('content')
<x-breadcum title="Profile Page"></x-breadcum>

    <hr class="hr">

    <section class="profile-grid-container">

        {{-- name update --}}
        <div>
            {{-- success msg --}}
            {{-- @if (session('name_update'))
                <div class="success-text flex justify-center items-center text-base font-medium" style="gap: 10px">
                    <i class="fa-regular fa-thumbs-up  text-xl"></i>
                    <span> {{ session('name_update') }} </span>
                </div>
            @endif --}}
            {{-- success msg --}}
            <div class="profile-form">
                <h2 class="flex justify-center items-center font-medium">NAME-UPDATE</h2>
                <form action="{{ route('home.profile.name.update') }}" method="POST">
                    @csrf
                    <div>
                        <div class="">
                            <label class="font-medium" for="">User Name</label>
                        </div>
                        <input type="text" name="name" id="floating_email"
                            class="text-sm @error('name')
                    is-invalid
                    @enderror"
                            placeholder="Enter Name" value="{{ old('name') }}" />
                        @error('name')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <button class="text-sm" type="submit">Submit</button>
                    </div>
                </form>
            </div>
        </div>

        {{-- email update --}}
        <div>
            {{-- success msg --}}
            {{-- @if (session('email_update'))
                <div class="success-text flex justify-center items-center text-base font-medium" style="gap: 10px">
                    <i class="fa-regular fa-envelope text-xl"></i>
                    <span> {{ session('email_update') }} </span>
                </div>
            @endif --}}
            {{-- success msg --}}
            <div class="profile-form">
                <h2 class="flex justify-center items-center font-medium">EMAIL-UPDATE</h2>
                <form action="{{ route('home.profile.email.update') }}" method="POST">
                    @csrf
                    <div>
                        <div class="">
                            <label class="font-medium" for="">User Email</label>
                        </div>
                        <input type="text" name="email" id="floating_email"
                            class="text-sm @error('current_password')
                        is-invalid
                        @enderror"
                            placeholder="Enter Email" value="{{ old('email') }}" />
                        @error('email')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <button class="text-sm" type="submit">Submit</button>
                    </div>
                </form>
            </div>
        </div>

        {{-- password update --}}
        <div>
            {{-- success msg --}}
            {{-- @if (session('password_update'))
                <div class="success-text flex justify-center items-center text-base font-medium" style="gap: 10px">
                    <i class="fa-solid fa-user-lock text-xl"></i>
                    <span> {{ session('password_update') }} </span>
                </div>
            @endif --}}
            {{-- success msg --}}
            <div class="profile-form-max">
                <h2 class="flex justify-center items-center font-medium">PASSWORD-UPDATE</h2>
                <form action="{{ route('home.profile.password.update') }}" method="POST">
                    @csrf
                    <div>
                        <div class="">
                            <label class="font-medium" for="">Current Password</label>
                        </div>
                        <input type="password" name="current_password" id="floating_email"
                            class="text-sm @error('current_password')
                     is-invalid
                     @enderror"
                            placeholder="Current Password" value="{{ old('current_password') }}" />
                        @error('current_password')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <div class="">
                            <label class="font-medium" for="">New Password</label>
                        </div>
                        <input type="password" name="password" id="floating_email"
                            class="text-sm @error('password')
                     is-invalid
                     @enderror"
                            placeholder="New Password" value="{{ old('password') }}" />
                        @error('password')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <div class="">
                            <label class="font-medium" for="">Confirem Password</label>
                        </div>
                        <input type="password" name="password_confirmation" id="floating_email"
                            class="text-sm @error('password_confirmation')
                     is-invalid
                     @enderror"
                            placeholder="Confirem Password" value="{{ old('password_confirmation') }}" />
                    </div>

                    <div>
                        <button class="text-sm" type="submit">Submit</button>
                    </div>
                </form>
            </div>
        </div>


        {{-- image update --}}
        <div>
            {{-- success msg --}}
            {{-- @if (session('image_update'))
                <div class="success-text flex justify-center items-center text-base font-medium" style="gap: 10px">
                    <i class="fa-regular fa-image text-xl"></i>
                    <span> {{ session('image_update') }} </span>
                </div>
            @endif --}}
            {{-- success msg --}}
            <div class="profile-form-max">
                <h2 class="flex justify-center items-center font-medium">IMAGE-UPDATE</h2>
                <form action="{{ route('home.profile.image.update') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div>
                        <div class="">
                            <label class="font-medium" for="">Image</label>
                        </div>
                        <picture class="d-block my-4">
                            <img id="port_img" src="{{ asset('uploads/default/default1.jpg') }}"
                                alt="portfolio create image" style="width: 100%; height: 205px; object-fit:contain;">
                        </picture>
                        <input type="file"
                            onchange="document.getElementById('port_img').src= window.URL.createObjectURL(this.files[0])"
                            name="image" id="floating_email"
                            class="text-sm @error('image')
                     is-invalid
                     @enderror" />
                        @error('image')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <button class="text-sm" type="submit">Submit</button>
                    </div>
                </form>
            </div>
        </div>








    </section>
@endsection

@section('script')
    @if (session('profile_update'))
        <script>
            Toastify({
                text: "{{ session('profile_update') }}",
                duration: 5000,
                newWindow: true,
                close: true,
                gravity: "top", // `top` or `bottom`
                position: "right", // `left`, `center` or `right`
                stopOnFocus: true, // Prevents dismissing of toast on hover
                style: {
                    background: "linear-gradient(to right, #00b09b, #96c93d)",
                },
                onClick: function() {} // Callback after click
            }).showToast();
        </script>
    @endif
@endsection


