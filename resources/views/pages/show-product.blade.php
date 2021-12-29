@extends('layouts.master')

@section('title', @env('APP_NAME') . ' - Products we sell')

@section('content')

@include('includes.banner-other-pages',['heading'=>$product->name,'linkToHomeUrl'=>route('fe-pages.home'),'linkToHomeText'=>'Home'])

<div class="page-section py-12 lg:py-24">
    <div class="page-wrapper">
        <h2 class="text-4xl md:text-5xl font-bold font-secondary text-right">{{ $product->name }}</h2>
        <div class="w-40 h-1 mt-4 ml-auto mr-0 bg-indigo-500 rounded-3xl z-10"></div>

        <div class="flex items-start mt-16">
            <div class="left-sidebar p-4 bg-violet-100 rounded-md w-72">
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
            <div class="w-[calc(100%-18rem)] ml-8">
                <div class="parameter mt-4 first:mt-0">
                    <p class="font-bold">
                        Description:
                    </p>
                    <p class=" text-blue-gray-800 text-lg mt-4">
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Reiciendis possimus, nam similique,
                        sequi ipsum quibusdam aspernatur ut nihil voluptatibus non vitae ad natus provident esse neque
                        nulla! Est, perspiciatis voluptate.
                    </p>
                </div>
            </div>
        </div>

        <div class="gallery mt-16">
            <h2 class="product-category-heading">Gallery</h2>
            <div class="grid grid-cols-3 gap-4">
                @foreach ($product->files as $file)
                <a href="{{ route('files.show-file-full-resolution',$file->id) }}">
                    <img src="{{ route('files.show-file',$file->id) }}" alt="" class="w-full h-64 object-cover">
                </a>
                @endforeach
            </div>
        </div>
    </div>
</div>





@include('includes.brands-we-sell')
@include('includes.why-choose-us')


@endsection