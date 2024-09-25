@extends('layouts.dashboardmaster')

@section('title')

    Blog's

@endsection

@section('blog', 'active selected text-red-900')

@section('content')
    <div>
        <x-breadcum title="Blog Show's Page"></x-breadcum>
        <hr class="hr">

        <section id="portfolio" class="xl:max-w-[1280px] mx-auto py-5 lg:py-10 px-4 md:px-8 lg:px-0">

            <h3 class="text-xl lg:text-3xl font-semibold  text-yellow-50 text-center" style="margin: 10px 0px">{{ $blog->id }} - {{ $blog->title }}</h3>

            <div class="card">
                <div class="w-full">
                    <img class="object-cover rounded-md w-full" src="{{ asset('uploads/blog') }}/{{ $blog->thumbnail }}" alt="Shoes">
                </div>
                <div class="my-5 space-y-7">
                    <h2 class="text-[#FFFFFF] text-4xl font-semibold" style="margin: 5px 0px;">{!! $blog->short_description !!}</h2>
                    <p class="text-[#8792AB] font-medium" style="margin: 5px 0px;"> {!! $blog->description !!}</p>
                    <a>Last updated : <strong> {{ $blog->updated_at }}</strong></a>
                </div>
            </div>



    </section>
    </div>

@endsection

