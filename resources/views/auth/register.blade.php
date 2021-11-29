@extends('layouts.master')

@section('title',@env('APP_NAME') .' - Login')

@section('content')
@include('includes.banner-other-pages',['heading'=>'Login','linkToHomeUrl'=>route('fe-pages.home'),'linkToHomeText'=>'Home'])

{{-- TO BE DONE --}}

@endsection