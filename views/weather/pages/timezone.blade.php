@extends('vendor.laravel-weather.layouts.index')

@section('content')
    <x-weather-timezone :$weatherTimezone/>
@endsection