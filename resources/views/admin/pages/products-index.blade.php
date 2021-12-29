@extends('admin.layouts.master')

@section('title',@env('APP_NAME') .' - CMS')

@section('admin-content')

<div id="products-react-mount" data-products-fetch-url="{{ route('api.products.index') }}"
    data-product-categories-fetch-url="{{ route('api.product-categories.index') }}"></div>

@endsection