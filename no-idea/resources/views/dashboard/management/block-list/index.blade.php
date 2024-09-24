@extends('layouts.dashboardmaster')


@section('content')

<x-breadcum title="Block User's"></x-breadcum>

@section('index-title')

Management's

@endsection


<div class="row">
    {{-- show data --}}
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <h4 class="header-title">Block'S Table</h4>
                <div class="table-responsive">
                    <table class="table mb-0">
                        <thead class="">
                            <tr class="">
                                <th>#</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Block</th>

                                @if (Auth::user()->role == 'admin')
                                    <th>Status</th>
                                    <th>Action</th>
                                @endif
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($only_users as $user)
                                <tr>
                                    <td scope="row">
                                        {{ $loop->index + 1 }}
                                    </td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>
                                        @if ( $user->block  == 1)
                                            <span>True</span>
                                        @endif
                                    </td>
                                    <td>{{ $user->role }}</td>
                                    @if (Auth::user()->role == 'admin')

                                        </td>
                                        <td>
                                            <a href="" class="btn btn-info btn-sm"><i
                                                    class="fa-regular fa-pen-to-square"></i></a>
                                            <a href="" class="btn btn-danger btn-sm"><i
                                                    class="fa-regular fa-trash-can"></i></a>
                                        </td>
                                    @endif
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="5" class="text-danger text-center">no blogger found!</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div> <!-- end table-responsive-->
            </div>
        </div> <!-- end card -->
    </div>

</div>


@endsection
