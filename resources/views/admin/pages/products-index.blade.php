@extends('admin.layouts.master')

@section('title',@env('APP_NAME') .' - CMS')

@section('admin-content')

<div id="products-react-mount" data-fetch-url="{{ route('api.products.index') }}"></div>

@endsection