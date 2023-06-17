@extends('vendor.laravel-weather.layouts.index')

@section('content')
    @if(!is_null($weatherTimezoneLocation))
        <x-weather-location :weatherLocation='$weatherTimezoneLocation'/>
    @endif

    <x-weather-timezone :$weatherTimezone/>
@endsection