@extends('layouts.master')

@section('title','Hi')

@section('content')
<section class="page-section pallete-green-bg py-10">
    <div class="page-wrapper">
        <div class="flex items-center justify-center">
            <div class="w-1/2 text pr-6">
                <h1 class="text-6xl font-bold font-secondary ">Welcome</h1>
                <h2 class="text-xl mt-4">Hope, u are doing well...</h2>
                <p class="mt-4 text-lg w-4/5">Lorem ipsum dolor sit amet consectetur adipisicing elit. Facere corrupti
                    totam
                    voluptate
                    minima?
                    Laudantium quod, quasi iusto hic vitae deserunt quisquam dicta nemo mollitia? Obcaecati placeat amet
                    accusamus dolorum consectetur.</p>
            </div>
            <div class="w-1/2 image">
                <img src="{{ asset('img/mobile.png') }}" alt="">
            </div>
        </div>
    </div>
</section>
@endsection