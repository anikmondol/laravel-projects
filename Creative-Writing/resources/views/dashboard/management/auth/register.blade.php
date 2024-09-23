@extends('layouts.dashboardmaster')

@section('management', 'active selected text-red-900');

@section('content')
    <div class="flex items-center justify-between py-2 mt-4">
        <h1 class="text-gray-600 font-bold">Dashboard</h1>
        <div class="flex items-center text-gray-600">
            <a href="#" class="">
                <span class="text-sm">Creative-Writing</span>
                <i class="ri-arrow-right-s-line ml-auto group-[.selected]:rotate-90"></i>
            </a>
            <p class="text-sm">Management</p>
        </div>
    </div>
    <hr class="hr">

    <div class="grid grid-cols-1 lg:grid-cols-2" style="gap: 15px">
        <div>
            <div class="relative overflow-x-auto shadow-2xl category-category-insert"
                style="margin-top: 10px; border-radius: 5px; border: 1px solid rgb(169, 148, 148)">
                <h1 class="flex items-center justify-center font-medium text-[22px] mb-2 mt-2"> Manager Table</h1>
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
                        @forelse ($managers as $manager)
                            <tr class=" border-b border-blue-400">
                                <td scope="row" class="px-6 py-4" style="padding: 20px">
                                    {{ $loop->index + 1 }}
                                </td>
                                <td class="px-6 py-4" style="padding: 20px 5px">
                                    {{ $manager->email }}
                                </td>

                                <td class="px-6 py-4" style="padding: 20px 5px">
                                    {{ $manager->name }}
                                </td>
                                @if (Auth::user()->role == 'admin')
                                    <td class="px-6 py-4" style="padding: 20px 5px;">
                                        <a href="{{ route('management.down', $manager->id) }}"
                                            style=" @if ($manager->role == 'active') background: green;
                                        @else
                                         background: green; @endif padding: 5px; color: white; border-radius: 4px">{{ Str::ucfirst($manager->role) }}</a>
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
                                <td colspan="5" class="table-date">No Manager's Found!</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        <div>
            {{-- Register Insert Form --}}
        <div>
            <div class="category-category-insert">
                <h2 class="flex justify-center items-center font-medium">Role & User Registration</h2>
                <form action="{{ route('management.store') }}" method="POST">
                    @csrf
                    <div>
                        <div class="">
                            <label class="font-medium text-sm" for="">Name</label>
                        </div>
                        <input type="text" name="name" id="floating_email"
                            class="text-sm @error('name')
                    is-invalid
                    @enderror"
                            placeholder="name" />
                        @error('name')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <div class="">
                            <label class="font-medium text-sm" for="">Email</label>
                        </div>
                        <input type="email" name="email" id="floating_email"
                            class="text-sm @error('email')
                    is-invalid
                    @enderror"
                            placeholder="email" />
                        @error('email')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <div class="">
                            <label class="font-medium text-sm" for="">Password</label>
                        </div>
                        <input type="password" name="password" id="floating_email"
                            class="text-sm @error('password')
                    is-invalid
                    @enderror"
                            placeholder="password" />
                        @error('password')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <div style="margin-bottom: 15px">
                            <label class="font-medium text-sm" for="">Role</label>
                        </div>
                        <select id="default" class="border outline-none mb-6 text-sm  block w-full register-selected"
                            name="role">
                            <option value="">Select Roles</option>
                            <option value="manager">Manager</option>
                            <option value="blogger">Blogger</option>
                            <option value="user">User</option>
                    </div>
                    </select>
                    @error('role')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
            </div>


            <div>
                <button class="text-sm" type="submit">Sing In</button>
            </div>
            </form>
        </div>
    </div>



    </div>

    </div>
@endsection



@section('script')
    @if (session('register_complete'))
        <script>
            Toastify({
                text: "{{ session('register_complete') }}",
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
