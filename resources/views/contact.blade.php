@extends('layouts.master')

@section('title',@env('APP_NAME') .' - Contact')

@section('content')
@include('includes.banner-other-pages',['heading'=>'Contact','linkToHomeUrl'=>route('fe-pages.home'),'linkToHomeText'=>'Home'])


<div class="page-section py-12 lg:py-24">
    <div class="page-wrapper">
        <div class="text-center">
            <h2 class="text-4xl md:text-5xl font-bold font-secondary">Let's get in touch</h2>
            <p class="text-xl text-gray-600 mt-4">Or not, if you don't want to.. Just saying, u know</p>
        </div>

        <div class="mt-16 w-full grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4 items-grid">
            <div class="w-full mt-6 xl:mt-0">
                <div class="icon">
                    <span class="z-10">
                        <i class="ri-phone-line"></i>
                    </span>
                    <div class="bubble mt-8 ml-4"></div>
                </div>
                <div class="text mt-4 md:mt-8 text-center">
                    <a href="tel:+16969420132" class="contact-text">+1 6969 420 132 </a>
                </div>
            </div>

            <div class="w-full mt-6 xl:mt-0">
                <div class="icon">
                    <span class="z-10">
                        <i class="ri-map-2-line"></i>
                    </span>
                    <div class="bubble mb-12 mr-8"></div>
                </div>
                <div class="text mt-4 md:mt-8 text-center">
                    <p class="contact-text">
                        Somewhere 846/465, Big City
                    </p>

                    <p class="contact-text mt-2">
                        64445 Big City, Big State
                    </p>

                </div>
            </div>

            <div class="w-full mt-6 xl:mt-0">
                <div class="icon">
                    <span class="z-10">
                        <i class="ri-at-line"></i>
                    </span>
                    <div class="bubble ml-6"></div>
                </div>
                <div class="text mt-4 md:mt-8 text-center">
                    <a href="mailto:random@email.com" class="contact-text">random@email.com</a>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="page-section">
    <iframe
        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d5405253.768028328!2d15.2127884843936!3d48.58525954179091!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x471460b9ae7cc67f%3A0xcd6b6167b1723a7d!2sSlovakia!5e0!3m2!1sen!2ssk!4v1634640002807!5m2!1sen!2ssk"
        class="w-full" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
</div>

<div class="page-section py-12 lg:py-24">
    <div class="page-wrapper flex justify-between items-center flex-col-reverse md:flex-row">
        <div class="w-full md:w-4/5 md:mr-6 mt-8 md:mt-0">
            <h2 class="text-3xl md:text-4xl font-bold font-secondary">...Or let's start chatting</h2>
            <p class="text-xl mt-4 ">You can find us on all social networks.</p>
        </div>
        <div class="w-full md:w-1/5">
            <p class="text-7xl sm:text-8xl flex items-center justify-center text-indigo-500">
                <i class="ri-chat-smile-3-line"></i>
            </p>
        </div>
    </div>
</div>

@endsection