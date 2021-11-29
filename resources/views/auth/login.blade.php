@extends('layouts.master')

@section('title',@env('APP_NAME') .' - Login')

@section('content')
@include('includes.banner-other-pages',['heading'=>'Login','linkToHomeUrl'=>route('fe-pages.home'),'linkToHomeText'=>'Home'])

<div class="page-section py-12 lg:py-24">
    <div class="page-wrapper flex justify-center items-center flex-col md:flex-row">
        <div class=" w-full  xs:w-5/6 sm:w-2/3 md:w-1/2  md:pr-6">
            <h2 class="heading-sm font-secondary text-gray-800 ">CMS entrance</h2>
            <p class="text-gray-700 font-bold text-4xl mt-4 font-secondary ">Login, in order to change content of
                website
            </p>
        </div>
        <div class="w-full xs:w-5/6 sm:w-2/3 md:w-1/2 flex justify-center items-center mt-12 md:mt-0">
            <div class="flex justify-center items-center flex-col w-full md:w-96 purple-shadow p-4 sm:p-6 rounded-lg ">
                @if ($errors->any())
                <div class="w-full mb-4 p-4 bg-rose-500 rounded-lg">
                    <h2 class="text-2xl font-secondary text-white font-bold mb-4">Form is filled wrong
                    </h2>
                    <ol class=" list-disc ml-8 text-white">
                        @foreach ($errors->all() as $error)
                        <li>
                            <p class="has-text-weight-bold text-white">{{ $error }}</p>
                        </li>
                        @endforeach
                    </ol>
                </div>
                @endif

                <form method="POST" action="{{ route('auth.login.store') }}"
                    class='flex justify-center items-center flex-col w-full '>
                    @csrf
                    <div class="input-control">
                        <input autocomplete="off" type="text" name="username" value="{{ old('username') }}"
                            class="w-full input-style" title="Input username" placeholder="Input username">
                    </div>
                    <div class="input-control mt-4">
                        <input autocomplete="off" type="password" name="password" class="w-full input-style"
                            title="Input password" placeholder="Input password">

                    </div>
                    <button type='submit' class="mt-6 w-full cta-button small" title="Log in">Log in</button>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection