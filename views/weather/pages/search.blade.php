@extends('vendor.laravel-weather.layouts.index')

@section('content')
    <x-weather-search :$weatherSearch/>
@endsection