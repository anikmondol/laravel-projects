@extends('layouts.dashboardmaster')

@section('title')

    Management

@endsection

@section('management', 'active selected text-red-900')

@section('content')
    <div>
        <x-breadcum title="Exists User's Page"></x-breadcum>
        <hr class="hr">
        <div class="grid grid-cols-1" style="gap: 15px">

            <div>
                <div class="relative overflow-x-auto shadow-2xl category-category-insert"
                    style="margin-top: 10px; border-radius: 5px; border: 1px solid rgb(169, 148, 148)">
                    <h1 class="flex items-center justify-center font-medium text-[22px] mb-2 mt-2"> item's Table</h1>
                    <table class="w-full text-sm text-left rtl:text-right text-blue-100 dark:text-blue-100">
                        <thead class="text-xs" style="padding: 15px; background: rgb(35, 33, 36)">
                            <tr>
                                <th scope="col" style="padding: 20px; color: white">
                                    #
                                </th>
                                <th scope="col" style="padding: 20px 5px; color: white">
                                    name
                                </th>
                                <th scope="col" style="padding: 20px 5px; color: white">
                                    Email
                                </th>
                                @if (Auth::user()->role == 'admin')
                                    <th scope="col" style="padding: 20px 5px; color: white">
                                        Is Block
                                    </th>
                                    <th scope="col" style="padding: 20px 5px; color: white">
                                        Blocking Time
                                    </th>
                                @endif
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($only_users as $item)
                                <tr class=" border-b border-blue-400">
                                    <td scope="row" class="px-6 py-4" style="padding: 20px">
                                        {{ $loop->index + 1 }}
                                    </td>
                                    <td class="px-6 py-4" style="padding: 20px 5px">
                                        {{ $item->email }}
                                    </td>
                                    <td class="px-6 py-4" style="padding: 20px 5px">
                                        {{ $item->name }}
                                    </td>
                                    @if ($item->block == 1)
                                    <td class="px-6 py-4" style="padding: 20px 5px">
                                        True
                                    </td>
                                    @endif
                                    <td class="px-6 py-4" style="padding: 20px 5px">
                                        {{ $item->updated_at }}
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="table-date">No item's Found!</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>

            {{-- <div>
                <div class="relative overflow-x-auto shadow-2xl category-category-insert"
                    style="margin-top: 10px; border-radius: 5px; border: 1px solid rgb(169, 148, 148)">
                    <h1 class="flex items-center justify-center font-medium text-[22px] mb-2 mt-2"> User's Table</h1>
                    <table class="w-full text-sm text-left rtl:text-right text-blue-100 dark:text-blue-100">
                        <thead class="text-xs" style="padding: 15px; background: rgb(35, 33, 36)">
                            <tr>
                                <th scope="col" style="padding: 20px; color: white">
                                    #
                                </th>
                                <th scope="col" style="padding: 20px 5px; color: white">
                                    name
                                </th>
                                <th scope="col" style="padding: 20px 5px; color: white">
                                    Email
                                </th>
                                @if (Auth::user()->role == 'admin')
                                    <th scope="col" style="padding: 20px 5px; color: white">
                                        Role
                                    </th>
                                    <th scope="col" style="padding: 20px 5px; color: white">
                                        Action
                                    </th>
                                @endif
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($users as $user)
                                <tr class=" border-b border-blue-400">
                                    <td scope="row" class="px-6 py-4" style="padding: 20px">
                                        {{ $loop->index + 1 }}
                                    </td>
                                    <td class="px-6 py-4" style="padding: 20px 5px">
                                        {{ $user->email }}
                                    </td>

                                    <td class="px-6 py-4" style="padding: 20px 5px">
                                        {{ $user->name }}
                                    </td>
                                    @if (Auth::user()->role == 'admin')
                                        <td class="px-6 py-4" style="padding: 20px 5px;">
                                            <a href="{{ route('user.down', $user->id) }}"
                                                style=" @if ($user->role == 'active') background: green;
                                        @else
                                         background: green; @endif padding: 5px; color: white; border-radius: 4px">{{ Str::ucfirst($user->role) }}</a>
                                        </td>
                                        <td class="px-6 py-4 text-white" style="padding: 20px 5px">
                                            <a class="rounded-md font-awesome-blue" href="">
                                                <i class="fa-regular fa-pen-to-square text-xl"></i>
                                            </a>
                                            <a class="rounded-md font-awesome-red" href="">
                                                <i class="fa-regular fa-trash-can text-xl"></i>
                                            </a>
                                        </td>
                                    @endif
                                </tr>
                                <hr>
                            @empty
                                <tr>
                                    <td colspan="5" class="table-date">No User's Found!</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div> --}}

        </div>


    </div>

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
