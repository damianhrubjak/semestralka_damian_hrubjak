@extends('layouts.master')

@section('title', @env('APP_NAME') . ' - Products we sell')

@section('content')

@include('includes.banner-other-pages',['heading'=>'Products we
sell','linkToHomeUrl'=>route('fe-pages.home'),'linkToHomeText'=>'Home'])

<div class="page-section py-12 lg:py-24">
    <div class="page-wrapper">
        <h2 class="text-4xl md:text-5xl font-bold font-secondary text-right">Our sortiment</h2>
        <div class="w-40 h-1 mt-4 ml-auto mr-0 bg-indigo-500 rounded-3xl z-10"></div>
        @foreach ($productsCategoriesWithProducts as $categoryName => $products)
        <div class="product-category">
            <h3 class="product-category-heading">{{ $categoryName }}:</h3>
            <div class="product-category-grid">
                @foreach ($products as $product)
                @include('items.product-item',compact('product'))
                @endforeach
            </div>
        </div>
        @endforeach

    </div>
</div>

@include('includes.brands-we-sell')
@include('includes.why-choose-us')

@endsection