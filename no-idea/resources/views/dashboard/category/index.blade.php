@extends('layouts.dashboardmaster')


@section('content')
    <!-- start page title -->
    <div class="py-3 py-lg-4">
        <div class="row">
            <div class="col-lg-6">
                <h4 class="page-title mb-0">Dashboard</h4>
            </div>
            <div class="col-lg-6">
                <div class="d-none d-lg-block">
                    <ol class="breadcrumb m-0 float-end">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Dashtrap</a></li>
                        <li class="breadcrumb-item active">Categories</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <!-- end page title -->

    <div class="row">


        <div class="col-lg-6">
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title">Category Table</h4>
                    <div class="table-responsive">
                        <table class="table mb-0">
                            <thead class="table-dark">
                                <tr>
                                    <th>#</th>
                                    <th>First Name</th>
                                    <th>Last Name</th>
                                    <th>Username</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th scope="row">1</th>
                                    <td>Mark</td>
                                    <td>Otto</td>
                                    <td>@mdo</td>
                                </tr>
                                <tr>
                                    <th scope="row">2</th>
                                    <td>Jacob</td>
                                    <td>Thornton</td>
                                    <td>@fat</td>
                                </tr>
                                <tr>
                                    <th scope="row">3</th>
                                    <td>Larry</td>
                                    <td>the Bird</td>
                                    <td>@twitter</td>
                                </tr>
                            </tbody>
                        </table>
                    </div> <!-- end table-responsive-->
                </div>
            </div> <!-- end card -->
        </div>

        {{-- image update --}}
        {{-- <div class="col-xl-6">
            {{-- success msg --}}
            <div class="card">
                <div class="card-body">
                    <h5 class="header-title">Category Insert Form</h5>
                    <form role="form" action="{{ route('category.store') }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="form-floating mb-3">
                            <input type="text"
                                class="form-control @error('title') is-invalid
                        @enderror"
                                id="floatingnameInput" placeholder="" name="title">
                            <label for="floatingnameInput">Category Title</label>
                            @error('title')
                                <p class="text-danger text-center pt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="form-floating mb-3">
                            <input type="text"
                                class="form-control @error('slug')
                        is-invalid
                        @enderror"
                                id="floatingnameInput" placeholder="" name="slug">
                            <label for="floatingnameInput">Category Slug</label>
                            @error('slug')
                                <p class="text-danger text-center pt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="form-floating mb-3">
                            <picture class="d-block my-4">
                                <img id="port_img" src="{{ asset('uploades/default/default1.jpg') }}"
                                    alt="portfolio create image" style="width: 100%; height: 108px; object-fit:contain;">
                            </picture>
                            <input type="file"
                                onchange="document.getElementById('port_img').src= window.URL.createObjectURL(this.files[0])"
                                class="form-control @error('image')
                        is-invalid
                        @enderror "
                                id="floatingnameInput" name="image" style="padding: 18px">
                            @error('image')
                                <p class="text-danger text-center pt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <button type="submit" class="btn btn-primary w-md">Submit</button>
                        </div>
                    </form>
                </div>
                <!-- end card body -->
            </div>
            <!-- end card -->
        </div> --}}

    </div>

@endsection
