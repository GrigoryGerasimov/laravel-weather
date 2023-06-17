@extends('vendor.laravel-weather.layouts.index')

@section('content')
    @if(!is_null($weatherAstroLocation))
        <x-weather-location :weatherLocation='$weatherAstroLocation'/>
    @endif

    <x-weather-astronomy :$weatherAstro/>
@endsection