@extends('layouts.dashboardmaster')

@section('title')

    Blog's

@endsection

@section('blog', 'active selected text-red-900')

@section('content')
    <div>
        <x-breadcum title="Blog Show's Page"></x-breadcum>
        <hr class="hr">

        <div class="grid grid-cols-1 lg:grid-cols-2" style="gap: 15px">
            <div>
                <div class="relative overflow-x-auto shadow-2xl category-category-insert"
                    style="margin-top: 10px; border-radius: 5px; border: 1px solid rgb(169, 148, 148)">
                    <h1 class="flex items-center justify-center font-medium text-[22px] mb-2 mt-2">Blog's Table</h1>
                    <table class="w-full text-sm text-left rtl:text-right text-blue-100 dark:text-blue-100">
                        <thead class="text-xs" style="padding: 15px; background: rgb(35, 33, 36)">
                            <tr>
                                <th scope="col" style="padding: 20px; color: white">
                                    #
                                </th>
                                <th scope="col" style="padding: 20px 5px; color: white">
                                    Image
                                </th>
                                <th scope="col" style="padding: 20px 5px; color: white">
                                    Title
                                </th>
                                <th scope="col" style="padding: 20px 5px; color: white">
                                    status
                                </th>
                                <th scope="col" style="padding: 20px 5px; color: white">
                                    Action
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($blogs as $blog)
                                <tr class=" border-b border-blue-400">
                                    <th scope="row" class="px-6 py-4" style="padding: 20px">
                                        {{ $loop->index + 1 }}
                                    </th>
                                    <td class="px-6 py-4" style="padding: 20px 5px">
                                        <img src="{{ asset('uploads/blog') }}/{{ $blog->thumbnail }}" alt="blog image"
                                            style="height: 70px">
                                    </td>
                                    <td class="px-6 py-4" style="padding: 20px 5px">
                                        {{ $blog->title }}
                                    </td>
                                    {{-- <td class="px-6 py-4" style="padding: 20px 5px;">
                                        <a href="{{ route('blogs.status', $blogs->id) }}"
                                            style=" @if ($blogs->status == 'active')
                                                 background: green;
                                            @else
                                             background: rgb(192, 18, 18);
                                            @endif padding: 5px; color: white; border-radius: 4px">{{ $blogs->status }}</a>
                                    </td> --}}
                                    {{-- <td class="px-6 py-4 text-white" style="padding: 20px 5px">
                                        <a class="rounded-md font-awesome-blue" href="{{ route('blogs.edit', $blogs->id) }}">
                                            <i class="fa-regular fa-pen-to-square text-xl"></i>
                                        </a>
                                        <a class="rounded-md font-awesome-red" href="{{ route('blogs.delete', $category->id) }}">
                                            <i class="fa-regular fa-trash-can text-xl"></i>
                                        </a>
                                    </td> --}}
                                </tr>
                                <hr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

        </div>


    </div>


@endsection

@section('script')
    @if (session('blog_create_success'))
        <script>
            Toastify({
                text: "{{ session('blog_create_success') }}",
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
