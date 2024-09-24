@extends('layouts.dashboardmaster')


@section('content')


@section('index-title')

Blog's

@endsection

<x-breadcum title="Blog Show's Page"></x-breadcum>

<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <h4 class="header-title">Category Table</h4>
                <div class="table-responsive">
                    <table class="table mb-0">
                        <thead class="">
                            <tr class="">
                                <th>#</th>
                                <th>Image</th>
                                <th>Title</th>
                                <th>Description</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($blogs as $blog)
                                <tr>
                                    <th scope="row">
                                        {{ $loop->index + 1 }}
                                    </th>
                                    <td>
                                        <img src="{{ asset('uploades/blog') }}/{{ $blog->thumbnail }}"
                                            style="width:90px; height:90px;">
                                    </td>
                                    <td>{{ $blog->title }}</td>
                                    <td>
                                        {!! $blog->description !!}
                                    </td>
                                    {{-- <td>
                                        <form id="status_id{{ $thumbnail->id }}"
                                            action="{{ route('category.status', $thumbnail->id) }}" method="POST">
                                            @csrf
                                            <div class="form-check form-switch">
                                                <input
                                                    onchange="document.querySelector('#status_id{{ $category->id }}').submit()"
                                                    class="form-check-input {{ $category->status == 'active' ? 'form-check-input' : 'bg-danger' }}"
                                                    type="checkbox" role="switch" id="flexSwitchCheckChecked"
                                                    {{ $category->status == 'active' ? 'checked' : '' }}>
                                            </div>
                                        </form>
                                    </td> --}}
                                    <td>
                                        <a href="{{ route('category.edit', $blog->id) }}"
                                            class="btn btn-info btn-sm"><i class="fa-regular fa-pen-to-square"></i></a>
                                        <a href="{{ route('category.delete', $blog->id) }}"
                                            class="btn btn-danger btn-sm"><i class="fa-regular fa-trash-can"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div> <!-- end table-responsive-->
            </div>
        </div> <!-- end card -->
    </div>



</div>



@endsection



@section('script')
@if (session('blog_create_success'))
    <script>
        Toastify({
            text: "{{ session('blog_create_success') }}",
            duration: 3000,
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
