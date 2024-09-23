@extends('layouts.dashboardmaster')



@section('content')
    <div class="flex items-center justify-between py-2 mt-4">
        <h1 class="text-gray-600 font-bold">Dashboard</h1>
        <div class="flex items-center text-gray-600">
            <a href="#" class="">
                <span class="text-sm">Creative-Writing</span>
                <i class="ri-arrow-right-s-line ml-auto group-[.selected]:rotate-90"></i>
            </a>
            <p class="text-sm">Categories</p>
        </div>
    </div>
    <hr class="hr">

    <div class="grid grid-cols-1 lg:grid-cols-2" style="gap: 15px">
        <div>
            <div class="relative overflow-x-auto shadow-2xl category-category-insert"
                style="margin-top: 10px; border-radius: 5px; border: 1px solid rgb(169, 148, 148)">
                <h1 class="flex items-center justify-center font-medium text-[22px] mb-2 mt-2">Category Table</h1>
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
                        @foreach ($categories as $category)
                            <tr class=" border-b border-blue-400">
                                <th scope="row" class="px-6 py-4" style="padding: 20px">
                                    {{ $loop->index + 1 }}
                                </th>
                                <td class="px-6 py-4" style="padding: 20px 5px">
                                    <img src="{{ asset('uploads/category') }}/{{ $category->image }}" alt="category image"
                                        style="height: 70px">
                                </td>
                                <td class="px-6 py-4" style="padding: 20px 5px">
                                    {{ $category->title }}
                                </td>
                                <td class="px-6 py-4" style="padding: 20px 5px;">
                                    <a href="{{ route('category.status', $category->id) }}"
                                        style=" @if ($category->status == 'active')
                                             background: green;
                                        @else
                                         background: rgb(192, 18, 18);
                                        @endif padding: 5px; color: white; border-radius: 4px">{{ $category->status }}</a>
                                </td>
                                <td class="px-6 py-4 text-white" style="padding: 20px 5px">
                                    <a class="rounded-md font-awesome-blue" href="{{ route('category.edit', $category->id) }}">
                                        <i class="fa-regular fa-pen-to-square text-xl"></i>
                                    </a>
                                    <a class="rounded-md font-awesome-red" href="{{ route('category.delete', $category->id) }}">
                                        <i class="fa-regular fa-trash-can text-xl"></i>
                                    </a>
                                </td>
                            </tr>
                            <hr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <div>
            {{-- Category Insert Form --}}
            <div>
                <div class="category-category-insert">
                    <h2 class="flex justify-center items-center font-medium">Category Insert Form</h2>
                    <form action="{{ route('category.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div>
                            <div class="">
                                <label class="font-medium text-sm" for="">Category Title</label>
                            </div>
                            <input type="text" name="title" id="floating_email"
                                class="text-sm @error('title')
                    is-invalid
                    @enderror"
                                placeholder="Title" />
                            @error('title')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div>
                            <div class="">
                                <label class="font-medium text-sm" for="">Category Slug</label>
                            </div>
                            <input type="text" name="slug" id="floating_email"
                                class="text-sm @error('slug')
                    is-invalid
                    @enderror"
                                placeholder="Slug" />
                            @error('slug')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div>
                            <div class="">
                                <label class="font-medium text-sm" for=""> Category Image</label>
                            </div>
                            <picture class="d-block my-4">
                                <img id="port_img" src="{{ asset('uploads/default/default1.jpg') }}"
                                    alt="portfolio create image" style="width: 100%; height: 150px; object-fit:contain;">
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



        </div>
    </div>

@endsection


@section('script')
    @if (session('category_success'))
        <script>
            Toastify({
                text: "{{ session('category_success') }}",
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
