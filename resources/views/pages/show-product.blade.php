@extends('layouts.master')

@section('title', @env('APP_NAME') . ' - Products we sell')

@section('content')

@include('includes.banner-other-pages',['heading'=>$product->name,'linkToHomeUrl'=>route('fe-pages.home'),'linkToHomeText'=>'Home'])

<div class="page-section py-12 lg:py-24">
    <div class="page-wrapper">
        <h2 class="text-4xl md:text-5xl font-bold font-secondary text-right">{{ $product->name }}</h2>
        <div class="w-40 h-1 mt-4 ml-auto mr-0 bg-indigo-500 rounded-3xl z-10"></div>

        <div class="flex items-start flex-col sm:flex-row mt-8 sm:mt-16">
            <div class="left-sidebar p-4 bg-violet-100 rounded-md w-full sm:w-72">
                <div class="parameters">
                    <div class="parameter mt-4 first:mt-0">
                        <p class="w-24">
                            Condition:
                        </p>
                        <p class="font-bold text-indigo-500 text-lg ml-4">
                            {{ $product->condition }}
                        </p>
                    </div>
                    <div class="parameter mt-4 first:mt-0">
                        <p class="w-24">
                            Parameters:
                        </p>
                        <p class="font-bold text-indigo-500 text-lg ml-4">
                            {{ $product->parameters }}
                        </p>
                    </div>
                    <div class="parameter mt-4 first:mt-0">
                        <p class="w-24">
                            Price[€]:
                        </p>
                        <p class="font-bold text-indigo-500 text-lg ml-4">
                            {{ $product->price }}
                        </p>
                    </div>
                    <div class="parameter mt-4 first:mt-0">
                        <p class="w-24">
                            Images:
                        </p>
                        <p class="font-bold text-indigo-500 text-lg ml-4">
                            Here is/are {{ $product->files->count() }} image(s)
                        </p>
                    </div>
                </div>
            </div>
            <div class="w-full sm:w-[calc(100%-18rem)] mt-4 sm:mt-0 sm:ml-8">
                <div class="parameter mt-4 first:mt-0">
                    <p class="font-bold">
                        Description:
                    </p>
                    <p class=" text-blue-gray-800 text-lg mt-4">
                        {{ $product->description }}
                    </p>
                </div>
            </div>
        </div>

        <div class="gallery mt-16">
            <h2 class="product-category-heading mb-2 md:mb-4">Gallery</h2>
            <div class="grid xs:grid-cols-2 md:grid-cols-3 gap-4">
                @foreach ($product->files as $file)
                <a data-fslightbox href="{{ route('files.show-file-full-resolution',$file->id) }}">
                    <img src="{{ route('files.show-file',$file->id) }}" alt=""
                        class="w-full h-64 object-cover rounded-md">
                </a>
                @endforeach
            </div>
        </div>
    </div>
</div>

@include('includes.brands-we-sell')
@include('includes.why-choose-us')


@endsection

@section('scripts')
<script src="{{ asset('js/fslightbox.js') }}"></script>
@endsection