@extends('vendor.laravel-weather.layouts.index')

@section('content')
    @if(!is_null($weatherCurrentLocation))
        <x-weather-location :weatherLocation='$weatherCurrentLocation'/>
    @endif

    <x-weather-current :$weatherCurrent :$weatherCurrentAQI/>
@endsection