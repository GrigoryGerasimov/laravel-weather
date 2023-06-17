@extends('vendor.laravel-weather.layouts.index')

@section('content')
    @if(!is_null($weatherForecastLocation))
        <x-weather-location :weatherLocation='$weatherForecastLocation'/>
    @endif

    @if(!is_null($weatherForecastCurrent))
        <x-weather-current :weatherCurrent='$weatherForecastCurrent'/>
    @endif

    <x-weather-forecast :$weatherForecast/>

    @if(!is_null($weatherForecastAlert))
        <x-weather-alert :weatherAlert='$weatherForecastAlert'/>
    @endif
@endsection