@extends('layouts.dashboardmaster')


@section('content')


@section('index-title')
    Blog's
@endsection

<x-breadcum title="Blog's Create Page"></x-breadcum>

<div class="row">


    {{-- Category Insert Form --}}
    <div class="col-xl-12">
        <div class="card">
            <div class="card-body">
                <h5 class="header-title">Blog Insert Form</h5>
                <form role="form" action="{{ route('blog.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-floating mb-3">
                        <select class="form-control" data-toggle="select2" name="category_id">
                            <option value="">Select</option>
                            <optgroup label="{{ env('APP_NAME') }}">
                                @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->title }}</option>
                                @endforeach

                            </optgroup>
                        </select>
                        <label for="floatingnameInput">Category</label>
                        @error('title')
                            <p class="text-danger text-center pt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text"
                            class="form-control @error('title') is-invalid
                        @enderror"
                            id="floatingnameInput" placeholder="" name="title">
                        <label for="floatingnameInput">Blog Title</label>
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
                        <label for="floatingnameInput">Blog Slug</label>
                        @error('slug')
                            <p class="text-danger text-center pt-1">{{ $message }}</p>
                        @enderror
                    </div>


                    <div class="form-floating mb-3">
                        <textarea id="short_description" type="text" class="form-control @error('short_description') is-invalid
                        @enderror"
                            id="floatingnameInput" name="short_description"></textarea>
                        <label for="floatingnameInput">Blog Short Description</label>
                        @error('short_description')
                            <p class="text-danger text-center pt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="form-floating mb-3">
                        <textarea id="description" type="text" class="form-control @error('description') is-invalid
                        @enderror"
                            id="floatingnameInput" name="description"></textarea>
                        <label for="floatingnameInput">Blog Description</label>
                        @error('description')
                            <p class="text-danger text-center pt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="form-floating mb-2">
                        <label for="floatingnameInput">Blog Thumbnail</label>
                        <picture class="d-block my-4">
                            <img id="port_img" src="{{ asset('uploades/default/default1.jpg') }}"
                                alt="portfolio create thumbnail"
                                style="width: 100%; height: 108px; object-fit:contain;">
                        </picture>
                        <input type="file"
                            onchange="document.getElementById('port_img').src= window.URL.createObjectURL(this.files[0])"
                            class="form-control @error('thumbnail')
                        is-invalid
                        @enderror "
                            id="floatingnameInput" name="thumbnail" style="padding: 18px">
                        @error('thumbnail')
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
    </div>

</div>


@endsection





@section('script')

<script>
    tinymce.init({
      selector: '#short_description',
      plugins: [
        // Core editing features
        'anchor', 'autolink', 'charmap', 'codesample', 'emoticons', 'image', 'link', 'lists', 'media', 'searchreplace', 'table', 'visualblocks', 'wordcount',
        // Your account includes a free trial of TinyMCE premium features
        // Try the most popular premium features until Oct 8, 2024:
        'checklist', 'mediaembed', 'casechange', 'export', 'formatpainter', 'pageembed', 'a11ychecker', 'tinymcespellchecker', 'permanentpen', 'powerpaste', 'advtable', 'advcode', 'editimage', 'advtemplate', 'ai', 'mentions', 'tinycomments', 'tableofcontents', 'footnotes', 'mergetags', 'autocorrect', 'typography', 'inlinecss', 'markdown',
      ],
      toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table mergetags | addcomment showcomments | spellcheckdialog a11ycheck typography | align lineheight | checklist numlist bullist indent outdent | emoticons charmap | removeformat',
      tinycomments_mode: 'embedded',
      tinycomments_author: 'Author name',
      mergetags_list: [
        { value: 'First.Name', title: 'First Name' },
        { value: 'Email', title: 'Email' },
      ],
      ai_request: (request, respondWith) => respondWith.string(() => Promise.reject('See docs to implement AI Assistant')),
    });
  </script>

<script>
    tinymce.init({
      selector: '#description',
      plugins: [
        // Core editing features
        'anchor', 'autolink', 'charmap', 'codesample', 'emoticons', 'image', 'link', 'lists', 'media', 'searchreplace', 'table', 'visualblocks', 'wordcount',
        // Your account includes a free trial of TinyMCE premium features
        // Try the most popular premium features until Oct 8, 2024:
        'checklist', 'mediaembed', 'casechange', 'export', 'formatpainter', 'pageembed', 'a11ychecker', 'tinymcespellchecker', 'permanentpen', 'powerpaste', 'advtable', 'advcode', 'editimage', 'advtemplate', 'ai', 'mentions', 'tinycomments', 'tableofcontents', 'footnotes', 'mergetags', 'autocorrect', 'typography', 'inlinecss', 'markdown',
      ],
      toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table mergetags | addcomment showcomments | spellcheckdialog a11ycheck typography | align lineheight | checklist numlist bullist indent outdent | emoticons charmap | removeformat',
      tinycomments_mode: 'embedded',
      tinycomments_author: 'Author name',
      mergetags_list: [
        { value: 'First.Name', title: 'First Name' },
        { value: 'Email', title: 'Email' },
      ],
      ai_request: (request, respondWith) => respondWith.string(() => Promise.reject('See docs to implement AI Assistant')),
    });
  </script>


@endsection
