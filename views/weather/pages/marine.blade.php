@extends('vendor.laravel-weather.layouts.index')

@section('content')
    @if(!is_null($weatherForecastLocation))
        <x-weather-location :weatherLocation='$weatherMarineLocation'/>
    @endif

    <x-weather-marine :$weatherMarine/>
@endsection