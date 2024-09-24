@extends('layouts.dashboardmaster')

@section('title')

    Blog's

@endsection

@section('blog', 'active selected text-red-900')

@section('content')
    <div>
        <x-breadcum title="Blog Create Page"></x-breadcum>
        <hr class="hr">

        <div class="grid grid-cols-1" style="gap: 15px">
                {{-- Category Insert Form --}}
                <div>
                    <div class="category-category-insert">
                        <h2 class="flex justify-center items-center font-medium">Blog Insert Form</h2>
                        <form action="{{ route('blog.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                                <div>
                                    <div style="margin-bottom: 15px">
                                        <label class="font-medium text-sm" for="">Role</label>
                                    </div>
                                    <select id="default"
                                        class="border outline-none mb-6 text-sm  block w-full register-selected"
                                        name="category_id">
                                        <option value="">Select</option>
                                        <optgroup label="{{ env('APP_NAME') }}">
                                            @foreach ($categories as $category)
                                            <option value="{{ $category->id }}">{{ $category->title }}</option>
                                            @endforeach
                                        </optgroup>
                                    </select>
                                    @error('category_id')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div>
                                    <div class="">
                                        <label class="font-medium text-sm" for="">Blog Title</label>
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
                                        <label class="font-medium text-sm" for="">Blog Slug</label>
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
                                    <div class="" style="margin-bottom: 16px">
                                        <label class="font-medium text-sm" for="">Short Description</label>
                                    </div>
                                    <textarea id="short_description" name="short_description" id="floating_email" placeholder="Short Description"
                                        class="w-full h-[170px] py-5 pl-8 text-[#262a31] outline-none text-[18px] border border-cyan-400"></textarea>
                                    @error('short_description')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div>
                                    <div class=""  style="margin: 16px 0px">
                                        <label class="font-medium text-sm" for="">Description</label>
                                    </div>
                                    <textarea id="description" name="description" id="floating_email" placeholder="Description"
                                        class="w-full h-[170px] py-5 pl-8 text-[#262a31] outline-none text-[18px] border border-cyan-400"></textarea>
                                    @error('description')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div>
                                    <div class="" style="margin-top: 16px">
                                        <label class="font-medium text-sm" for=""> Blog Thumbnail</label>
                                    </div>
                                    <picture class="d-block my-4">
                                        <img id="port_img" src="{{ asset('uploads/default/default1.jpg') }}"
                                            alt="portfolio create thumbnail"
                                            style="width: 100%; height: 150px; object-fit:contain;">
                                    </picture>
                                    <input type="file"
                                        onchange="document.getElementById('port_img').src= window.URL.createObjectURL(this.files[0])"
                                        name="thumbnail" id="floating_email"
                                        class="text-sm @error('thumbnail')
                             is-invalid
                             @enderror" />
                                    @error('thumbnail')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            <div>
                                <button class="text-sm mt-2" name="btn" type="submit">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
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
