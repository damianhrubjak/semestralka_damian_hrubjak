@extends('layouts.master')

@section('title','Hi')

@section('content')
<section class="page-section pallete-green-bg py-12 lg:py-24">
    <div class="page-wrapper">
        <div class="flex flex-col-reverse md:flex-row items-center justify-center">
            <div class="w-full md:w-1/2 text pr-6">
                <h1 class="text-4xl md:text-6xl font-bold font-secondary ">Welcome</h1>
                <h2 class="text-lg md:text-xl mt-4">Hope, u are doing well...</h2>
                <p class="mt-4 text-base md:text-lg w-full xs:w-4/5">Lorem ipsum dolor sit amet consectetur adipisicing
                    elit. Facere
                    corrupti
                    totam
                    voluptate
                    minima?
                    Laudantium quod, quasi iusto hic vitae deserunt quisquam dicta nemo mollitia? Obcaecati placeat amet
                    accusamus dolorum consectetur.</p>
            </div>
            <div class="w-full max-w-sm md:w-1/2 image">
                <img src="{{ asset('images/mobile.png') }}" alt="">
            </div>
        </div>
    </div>
</section>

<section class="page-section py-12 lg:py-24">
    <div class="page-wrapper relative">
        {{-- <p class=" absolute right-0 bottom-0 text-9xl text-white section-blur-heading uppercase font-bold">Who We are
        </p> --}}
        <div class="flex flex-col lg:flex-row items-center justify-center">
            <div class="w-full md:w-3/4 lg:w-1/2 text lg:pr-6 relative">
                <h2 class="text-4xl md:text-5xl font-bold font-secondary ">Who we <span
                        class="text-purple-500 uppercase">are?</span>
                </h2>
                <div class="w-48 xl:w-96 h-1 bg-purple-500 relative xl:absolute right-0 mt-4 -mr-36 rounded-3xl z-10">
                </div>
                <h2 class="text-xl mt-4">Actually, I don't know</h2>
                <p class="mt-4 text-lg w-4/5">Lorem ipsum dolor sit amet consectetur adipisicing elit. Facere corrupti
                    totam
                    voluptate
                    minima?
                </p>

                <h3 class="text-xl font-bold my-6"><em>“You can do <span class="uppercase text-purple-500">More</span>,
                        with
                        right tools”</em></h3>

                <p>Laudantium quod, quasi iusto hic vitae deserunt quisquam dicta nemo mollitia? Obcaecati
                    placeat amet
                    accusamus dolorum consectetur.</p>
                <div class="mt-10 flex w-full xs:w-3/4 sm:w-full mx-auto flex-col justify-center sm:flex-row">
                    <button class="cta-button mt-4">Visit
                        Us</button>
                    <button class="ghost-button sm:ml-4 mt-4">Call
                        Us</button>
                </div>
            </div>
            <div class="w-full md:w-3/4 lg:w-1/2 mt-8 lg:mt-0 image who-we-are-image">
                <img src="{{ asset('images/people.jpg') }}" alt="">
            </div>
        </div>
    </div>
</section>

<section class="page-section py-12 lg:py-24  bg-gray-100">
    <div class="page-wrapper relative">

        <div class="heading text-center">
            <h2 class="text-4xl md:text-5xl font-bold font-secondary">Newest products </h2>
            <div class="w-40 h-1 mt-4 mx-auto bg-purple-500 rounded-3xl z-10"></div>
            <p class="mt-4 text-lg">Choose and buy one, if you like it. Or just BUY IT!! </p>
        </div>

        <div class="products-home-page grid grid-cols-1 sm:grid-cols-2  lg:grid-cols-3 gap-5 mt-20">
            <div class="product-item-homepage">
                <div class="image">
                    <img src="{{ asset('images/iphone.jpg') }}" alt="">
                    <button class="buy-button cta-button">BUY</button>
                </div>
                <div class="text">
                    <h3 class="heading-product">Smartphone</h3>
                    <p>
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Culpa alias harum minima excepturi.
                    </p>
                </div>
            </div>
            <div class="product-item-homepage">
                <div class="image">
                    <img src="{{ asset('images/pc.jpg') }}" alt="">
                    <button class="buy-button cta-button">BUY</button>
                </div>
                <div class="text">
                    <h3 class="heading-product">CPU</h3>
                    <p>
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Culpa alias harum minima excepturi.
                    </p>
                </div>
            </div>
            <div class="product-item-homepage">
                <div class="image">
                    <img src="{{ asset('images/laptop.jpg') }}" alt="">
                    <button class="buy-button cta-button">BUY</button>
                </div>
                <div class="text">
                    <h3 class="heading-product">Laptop</h3>
                    <p>
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Culpa alias harum minima excepturi.
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="page-section py-12 lg:py-24">
    <div class="page-wrapper flex justify-between items-center flex-col-reverse md:flex-row">
        <div class="w-full md:w-3/5 md:mr-6 mt-8 md:mt-0">
            <h2 class="text-3xl md:text-4xl font-bold font-secondary">Don't worry, we don't bite</h2>
            <p class="text-xl mt-4 ">You can feel free to contact us, if you have any questions</p>
            <a href="" class="cta-button mt-8 inline-block">+1 6969 420 132</a>
        </div>
        <div class="w-full md:w-2/5 flex justify-center md:justify-end">
            <p class="text-5xl sm:text-7xl lg:text-8xl flex items-center justify-center text-indigo-500">
                <i class="ri-thumb-up-line"></i>
            </p>
            <p class="text-7xl sm:text-8xl lg:text-9xl flex items-center justify-center text-purple-800">
                <i class="ri-emotion-line"></i>
            </p>
            <p class="text-5xl sm:text-7xl lg:text-8xl flex items-center justify-center text-indigo-500">
                <i class="ri-heart-2-line"></i>
            </p>
        </div>
    </div>
</section>
@endsection