@extends('layouts.dashboardmaster')

@section('title')
    Dashboard
@endsection


@section('content')
    <x-breadcum title="Dashboard"></x-breadcum>
    <hr class="hr">

    <h1>Dashboard</h1>
@endsection

@section('script')
    @if (session('role_assign'))
        <script>
            Toastify({
                text: "{{ session('role_assign') }}",
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
