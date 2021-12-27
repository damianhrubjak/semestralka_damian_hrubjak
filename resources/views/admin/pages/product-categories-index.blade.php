@extends('admin.layouts.master')

@section('title',@env('APP_NAME') .' - CMS')

@section('admin-content')

<div id="product-categories-react-mount" data-fetch-url="{{ route('api.product-categories.index') }}"></div>

@endsection