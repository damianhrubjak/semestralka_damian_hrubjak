@extends('layouts.master')

@section('title', @env('APP_NAME') . ' - Products we sell')

@section('content')
@include('includes.banner-other-pages',['heading'=>'Products we
sell','linkToHomeUrl'=>route('fe-pages.home'),'linkToHomeText'=>'Home'])



<section class="page-section py-12 lg:py-24">
    <div class="page-wrapper">
        <h2 class="text-4xl md:text-5xl font-bold font-secondary text-right">Our sortiment</h2>
        <div class="w-40 h-1 mt-4 ml-auto mr-0 bg-indigo-500 rounded-3xl z-10"></div>

        {{-- Laptops --}}
        <div class="product-category">
            <h3 class="product-category-heading">Laptops:</h3>
            <div class="product-category-grid">
                <div class="product-item">
                    <div class="image">
                        <img src="{{ asset('images/laptop.jpg') }}" alt="">
                    </div>
                    <div class="text">
                        <h3 class="heading-product">Dell XPS 13</h3>
                        <div class="parameters">
                            <div class="parameter flex items-center">
                                <p class="w-24">
                                    Condition:
                                </p>
                                <p class="font-bold ml-4 text-indigo-500">
                                    New
                                </p>
                            </div>
                            <div class="parameter flex items-center">
                                <p class="w-24">
                                    Parameters:
                                </p>
                                <p class="font-bold ml-4 text-indigo-500">
                                    i7, QHD, 8GB, 2TB SSD
                                </p>
                            </div>
                            <div class="parameter flex items-center">
                                <p class="w-24">
                                    Price[€]:
                                </p>
                                <p class="font-bold ml-4 text-indigo-500">
                                    1399.99
                                </p>
                            </div>
                        </div>
                        <div class="w-full flex">
                            <button class="ml-auto mr-0 mt-4 cta-button">BUY</button>
                        </div>
                    </div>
                </div>
                <div class="product-item">
                    <div class="image">
                        <img src="{{ asset('images/hp-elitebook.jpg') }}" alt="">
                    </div>
                    <div class="text">
                        <h3 class="heading-product">HP Elitebook G7</h3>
                        <div class="parameters">
                            <div class="parameter flex items-center">
                                <p class="w-24">
                                    Condition:
                                </p>
                                <p class="font-bold ml-4 text-indigo-500">
                                    Used
                                </p>
                            </div>
                            <div class="parameter flex items-center">
                                <p class="w-24">
                                    Parameters:
                                </p>
                                <p class="font-bold ml-4 text-indigo-500">
                                    i9, FHD, 16GB, 1TB m.2 SSD
                                </p>
                            </div>
                            <div class="parameter flex items-center">
                                <p class="w-24">
                                    Price[€]:
                                </p>
                                <p class="font-bold ml-4 text-indigo-500">
                                    1199.99
                                </p>
                            </div>
                        </div>
                        <div class="w-full flex">
                            <button class="ml-auto mr-0 mt-4 cta-button">BUY</button>
                        </div>
                    </div>
                </div>
                <div class="product-item">
                    <div class="image">
                        <img src="{{ asset('images/macbook.jpg') }}" alt="">
                    </div>
                    <div class="text">
                        <h3 class="heading-product">MacBook Pro 16 2019</h3>
                        <div class="parameters">
                            <div class="parameter flex items-center">
                                <p class="w-24">
                                    Condition:
                                </p>
                                <p class="font-bold ml-4 text-indigo-500">
                                    New
                                </p>
                            </div>
                            <div class="parameter flex items-center">
                                <p class="w-24">
                                    Parameters:
                                </p>
                                <p class="font-bold ml-4 text-indigo-500">
                                    i7, 4K, 8GB, 4TB SSD
                                </p>
                            </div>
                            <div class="parameter flex items-center">
                                <p class="w-24">
                                    Price[€]:
                                </p>
                                <p class="font-bold ml-4 text-indigo-500">
                                    1999.99
                                </p>
                            </div>
                        </div>
                        <div class="w-full flex">
                            <button class="ml-auto mr-0 mt-4 cta-button">BUY</button>
                        </div>
                    </div>
                </div>
                <div class="product-item">
                    <div class="image">
                        <img src="{{ asset('images/lenovo.jpg') }}" alt="">
                    </div>
                    <div class="text">
                        <h3 class="heading-product">Lenovo Ideapad 530</h3>
                        <div class="parameters">
                            <div class="parameter flex items-center">
                                <p class="w-24">
                                    Condition:
                                </p>
                                <p class="font-bold ml-4 text-indigo-500">
                                    New
                                </p>
                            </div>
                            <div class="parameter flex items-center">
                                <p class="w-24">
                                    Parameters:
                                </p>
                                <p class="font-bold ml-4 text-indigo-500">
                                    i3, FHD, 4GB, 500GB HDD
                                </p>
                            </div>
                            <div class="parameter flex items-center">
                                <p class="w-24">
                                    Price[€]:
                                </p>
                                <p class="font-bold ml-4 text-indigo-500">
                                    499.99
                                </p>
                            </div>
                        </div>
                        <div class="w-full flex">
                            <button class="ml-auto mr-0 mt-4 cta-button">BUY</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- Smartphone --}}
        <div class="product-category">
            <h3 class="product-category-heading">Smartphones:</h3>
            <div class="product-category-grid">
                <div class="product-item">
                    <div class="image">
                        <img src="{{ asset('images/pixel.jpg') }}" alt="">
                    </div>
                    <div class="text">
                        <h3 class="heading-product">Google Pixel 5</h3>
                        <div class="parameters">
                            <div class="parameter flex items-center">
                                <p class="w-24">
                                    Condition:
                                </p>
                                <p class="font-bold ml-4 text-indigo-500">
                                    New
                                </p>
                            </div>
                            <div class="parameter flex items-center">
                                <p class="w-24">
                                    Parameters:
                                </p>
                                <p class="font-bold ml-4 text-indigo-500">
                                    Android, 48MPX
                                </p>
                            </div>
                            <div class="parameter flex items-center">
                                <p class="w-24">
                                    Price[€]:
                                </p>
                                <p class="font-bold ml-4 text-indigo-500">
                                    799.99
                                </p>
                            </div>
                        </div>
                        <div class="w-full flex">
                            <button class="ml-auto mr-0 mt-4 cta-button">BUY</button>
                        </div>
                    </div>
                </div>
                <div class="product-item">
                    <div class="image">
                        <img src="{{ asset('images/iphone.jpg') }}" alt="">
                    </div>
                    <div class="text">
                        <h3 class="heading-product">iPhone 12 Max</h3>
                        <div class="parameters">
                            <div class="parameter flex items-center">
                                <p class="w-24">
                                    Condition:
                                </p>
                                <p class="font-bold ml-4 text-indigo-500">
                                    New
                                </p>
                            </div>
                            <div class="parameter flex items-center">
                                <p class="w-24">
                                    Parameters:
                                </p>
                                <p class="font-bold ml-4 text-indigo-500">
                                    iOS 15, 12 MPX, A15
                                </p>
                            </div>
                            <div class="parameter flex items-center">
                                <p class="w-24">
                                    Price[€]:
                                </p>
                                <p class="font-bold ml-4 text-indigo-500">
                                    1199.99
                                </p>
                            </div>
                        </div>
                        <div class="w-full flex">
                            <button class="ml-auto mr-0 mt-4 cta-button">BUY</button>
                        </div>
                    </div>
                </div>
                <div class="product-item">
                    <div class="image">
                        <img src="{{ asset('images/xiaomi.jpg') }}" alt="">
                    </div>
                    <div class="text">
                        <h3 class="heading-product">Xiaomi 11</h3>
                        <div class="parameters">
                            <div class="parameter flex items-center">
                                <p class="w-24">
                                    Condition:
                                </p>
                                <p class="font-bold ml-4 text-indigo-500">
                                    New
                                </p>
                            </div>
                            <div class="parameter flex items-center">
                                <p class="w-24">
                                    Parameters:
                                </p>
                                <p class="font-bold ml-4 text-indigo-500">
                                    SD 888, 12GB, 256GB, 256MPX
                                </p>
                            </div>
                            <div class="parameter flex items-center">
                                <p class="w-24">
                                    Price[€]:
                                </p>
                                <p class="font-bold ml-4 text-indigo-500">
                                    999.99
                                </p>
                            </div>
                        </div>
                        <div class="w-full flex">
                            <button class="ml-auto mr-0 mt-4 cta-button">BUY</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- Smart Wearables --}}
        <div class="product-category">
            <h3 class="product-category-heading">Wearables:</h3>
            <div class="product-category-grid">
                <div class="product-item">
                    <div class="image">
                        <img src="{{ asset('images/apple-watch.jpg') }}" alt="">
                    </div>
                    <div class="text">
                        <h3 class="heading-product">Apple Watch 6</h3>
                        <div class="parameters">
                            <div class="parameter flex items-center">
                                <p class="w-24">
                                    Condition:
                                </p>
                                <p class="font-bold ml-4 text-indigo-500">
                                    Used
                                </p>
                            </div>
                            <div class="parameter flex items-center">
                                <p class="w-24">
                                    Parameters:
                                </p>
                                <p class="font-bold ml-4 text-indigo-500">
                                    40mm, 32GB, BT 5.0
                                </p>
                            </div>
                            <div class="parameter flex items-center">
                                <p class="w-24">
                                    Price[€]:
                                </p>
                                <p class="font-bold ml-4 text-indigo-500">
                                    499.99
                                </p>
                            </div>
                        </div>
                        <div class="w-full flex">
                            <button class="ml-auto mr-0 mt-4 cta-button">BUY</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </div>
</section>
<section class="page-section product-brands-we-sell py-12 lg:py-18">
    <div class="page-wrapper flex justify-between items-center flex-wrap mt-12">
        <div class="brand-we-sell">
            <i class="ri-android-line"></i>
        </div>
        <div class="brand-we-sell">
            <i class="ri-xbox-line"></i>
        </div>
        <div class="brand-we-sell">
            <i class="ri-switch-line"></i>
        </div>
        <div class="brand-we-sell">
            <i class="ri-playstation-line"></i>
        </div>
        <div class="brand-we-sell">
            <i class="ri-microsoft-line"></i>
        </div>
        <div class="brand-we-sell">
            <i class="ri-ie-line"></i>
        </div>
        <div class="brand-we-sell">
            <i class="ri-apple-line"></i>
        </div>
    </div>
</section>

<section class="page-section py-12 lg:py-24">
    <div class="page-wrapper">
        <h2 class="text-4xl md:text-5xl font-bold font-secondary ">Why choose us ?</h2>
        <h3 class="text-xl mt-4">Actually, I don't know, but u you definitely should</h3>

        <div class="mt-16 w-full grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4 items-grid">
            <div class="w-full mt-6 xl:mt-0">
                <div class="icon">
                    <span class="z-10">
                        <i class="ri-price-tag-3-line"></i>
                    </span>
                    <div class="bubble mt-8 ml-4"></div>
                </div>
                <div class="text mt-4 md:mt-8 text-center">
                    <h3 class="contact-text">Low prices</h3>
                    <p class="mt-4 w-4/5 mx-auto">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Placeat ab
                        quos, hic
                        error
                        obc</p>
                </div>
            </div>
            <div class="w-full mt-6 xl:mt-0">
                <div class="icon">
                    <span class="z-10">
                        <i class="ri-check-double-line"></i>
                    </span>
                    <div class="bubble mt-8 ml-4"></div>
                </div>
                <div class="text mt-4 md:mt-8 text-center">
                    <h3 class="contact-text">Double-checked devices</h3>
                    <p class="mt-4 w-4/5 mx-auto">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Placeat ab
                        quos, hic
                        error
                        obc</p>
                </div>
            </div>
            <div class="w-full mt-6 xl:mt-0">
                <div class="icon">
                    <span class="z-10">
                        <i class="ri-truck-line"></i>
                    </span>
                    <div class="bubble mt-8 ml-4"></div>
                </div>
                <div class="text mt-4 md:mt-8 text-center">
                    <h3 class="contact-text">Fast, free and safe delivery</h3>
                    <p class="mt-4 w-4/5 mx-auto">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Placeat ab
                        quos, hic
                        error
                        obc</p>
                </div>
            </div>
        </div>
    </div>
</section>



@endsection