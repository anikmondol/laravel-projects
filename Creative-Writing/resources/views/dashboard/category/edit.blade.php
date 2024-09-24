@extends('layouts.dashboardmaster')

@section('title')
    Category
@endsection

@section('content')
    <x-breadcum title="Category Edit Page"></x-breadcum>
    <hr class="hr">
    <div>
        {{-- Category Insert Form --}}
        <div class="category-category-insert">
            <h2 class="flex justify-center items-center font-medium">Category Edit Form</h2>
            <form role="form" action="{{ route('category.update', $category->id) }}" method="POST"
                enctype="multipart/form-data">
                @csrf
                <div>
                    <div class="">
                        <label class="font-medium text-sm" for="">Category Title</label>
                    </div>
                    <input type="text" name="title" id="floating_email"
                        class="text-sm @error('title')
                is-invalid
                @enderror"
                        placeholder="Title" value="{{ $category->title }}" />
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
                        placeholder="Slug" value="{{ $category->slug }}" />
                    @error('slug')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
                <div>
                    <div class="">
                        <label class="font-medium text-sm" for=""> Category Image</label>
                    </div>
                    <picture class="d-block my-4">
                        <img id="port_img" src="{{ asset('uploads/category') }}/{{ $category->image }}"
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
@endsection
