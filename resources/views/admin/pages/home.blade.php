@extends('admin.layouts.master')

@section('title',@env('APP_NAME') .' - CMS')

@section('admin-content')

<h1 class="text-4xl font-secondary">Hello, {{ Auth::user()->name }}</h1>

<div class="motivational-quote mt-8 text-lg w-full p-4 rounded-lg bg-gradient-to-br from-indigo-300 to-purple-300">
    <h2>Motivational quote for you:</h2>
    <div class="mt-2">
        <em class="font-secondary text-xl text-gray-900"><q>{{$quote}}</q></em>
    </div>
</div>

@endsection