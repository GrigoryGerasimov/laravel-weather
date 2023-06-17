@extends('vendor.laravel-weather.layouts.index')

@section('content')
    <x-weather-ip :$weatherIpLookup/>
@endsection